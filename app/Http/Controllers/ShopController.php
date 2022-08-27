<?php

namespace App\Http\Controllers;

use DB;
use Hash;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Spatie\shop\Models\Role;

class ShopController extends Controller
{
    
    function __construct()
    {
        $this->middleware('permission:shop-list|shop-create|shop-edit|shop-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:shop-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:shop-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:shop-delete', ['only' => ['destroy']]);
    }

   
    public function index(Request $request)
    {
        $data = User::orderBy('id', 'desc')->paginate(5);
        
        return view('shop.index', compact('data'));
    }

    
    public function create()
    {
        return view('shop.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed',
            'roles' => 'required'
        ]);
    
        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
    
        $user = User::create($input);
        $user->assignRole($request->input('roles'));
    
        return redirect()->route('shop.index')
            ->with('success', 'User created successfully.');
    }

    
    public function show($id)
    {
        $user = User::find($id);

        return view('shop.show', compact('user'));
    }

 
    public function edit($id)
    {
        $post = User::find($id);
        $roles = Role::pluck('name', 'name')->all();
        $userRole = $post->roles->pluck('name', 'name')->all();
        $business = Business::where('status','=',1)->pluck('name', 'id')->all();
        return view('shop.edit', compact('post', 'roles', 'userRole','business'));
    }

    
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'password' => 'confirmed',
            'roles' => 'required'
        ]);
    
        $input = $request->all();
        
        if(!empty($input['password'])) { 
            $input['password'] = Hash::make($input['password']);
        } else {
            $input = Arr::except($input, array('password'));    
        }
    
        $user = User::find($id);
        $user->update($input);

        DB::table('model_has_roles')
            ->where('model_id', $id)
            ->delete();
    
        $user->assignRole($request->input('roles'));
    
        return redirect()->route('shop.index')
            ->with('success', 'User updated successfully.');
    }

    public function destroy($id)
    {
        User::find($id)->delete();

        return redirect()->route('shop.index')
            ->with('success', 'User deleted successfully.');
    }
}