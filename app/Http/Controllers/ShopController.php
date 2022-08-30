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
        return view('shop.index');
    } 

    public function shopList() {
        $industry = User::where('type','shop')->orderBy('id', 'desc')->get();
        return datatables()->of($industry)
            ->editColumn('created_at', '{{ date("d-m-Y", strtotime($created_at)) }}')
            ->addColumn('action', function($row) {
                $btn = '';
                $btn .= '<div class="btn-group">';
                $btn .= ' <a class="btn btn-primary" href="' . route('shop.edit', [$row->id]) . '">Edit</a>';
                return $btn;
            })

            ->addIndexColumn()
            ->rawColumns([
                'status' => 'status',
                'action' => 'action'
            ])
            ->make(true);
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
            'shopname' => 'required|unique:users,shopname',
            'password' => 'required|confirmed',
        ]);
    
        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
        $input['type'] = 'shop';
        $user = User::create($input);
        $user->assignRole($request->input('roles'));
         User::where('id',$user->id)->update(array('shop_id' =>$user->id));
       
        return redirect()->route('shop.index')
            ->with('success', 'Shop created successfully.');
    }

    
    public function show($id)
    {
        $user = User::find($id);

        return view('shop.show', compact('user'));
    }

 
    public function edit($id)
    {
        $post = User::find($id);
        return view('shop.edit', compact('post'));
    }

    
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'password' => 'confirmed',
        ]);
    
        $input = $request->all();
        
        if(!empty($input['password'])) { 
            $input['password'] = Hash::make($input['password']);
        } else {
            $input = Arr::except($input, array('password'));    
        }
    
        $user = User::find($id);
        $input['type'] = 'shop';
        $user->update($input);

    
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