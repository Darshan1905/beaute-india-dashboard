<?php

namespace App\Http\Controllers;

use App\Models\Userbranch;
use App\Models\Branch;
use App\Models\User;
use App\Models\Industrysegment;
use App\Models\Countries;
use App\Models\State;
use App\Models\Cities;
use Illuminate\Http\Request;

class UserbranchController extends Controller
{
    
    function __construct()
    {
         $this->middleware('permission:userbranches-list|userbranches-create|userbranches-edit|userbranches-delete', ['only' => ['index', 'show']]);
         $this->middleware('permission:userbranches-create', ['only' => ['create', 'store']]);
         $this->middleware('permission:userbranches-edit', ['only' => ['edit', 'update']]);
         $this->middleware('permission:userbranches-delete', ['only' => ['destroy']]);
    }

   
    public function index(Request $request)
    {
        return view('userbranches.index');
    }

    public function userbranchesList() {
        $industry = Userbranch::get();
        return datatables()->of($industry)
                        ->editColumn('created_at', '{{ date("d-m-Y", strtotime($created_at)) }}')
                        ->editColumn('branch', function($row) {
                            return Branch::where('id','=',$row->branch_id)->first()->name; })

                        ->editColumn('user', function($row) {
                                return User::where('id','=',$row->user_id)->first()->name; })
        
                       ->editColumn('status', function($row) {
                            return $row->status == 1 ? '<span class="badge badge-success">Active</span>' : '<span class="badge badge-danger">In-Active</span>';
                        })
                        ->addColumn('action', function($row) {
                            $btn = '';
                            $btn .= '<div class="btn-group">';
                            $btn .= ' <a class="btn btn-primary" href="' . route('userbranches.edit', [$row->id]) . '">Edit</a>';
                            return $btn;
                        })
                        ->rawColumns([
                            'branch' => 'branch',
                            'user' => 'user',
                            'status' => 'status',
                            'action' => 'action'
                        ])
                        ->make(true);
    }

    
    public function create()
    {   
        $branch = Branch::where('status','=',1)->pluck('name', 'id')->all();
        $user = User::where('status','=',1)->pluck('name', 'id')->all();
        $countries = Countries::pluck('name', 'id')->all();
        return view('userbranches.create',compact('branch','user','countries'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'branch_id' => 'required',
            'user_id' => 'required',
            'country_id' => 'required',
            'state_id' => 'required',
            'city' => 'required',
        ]);

      
        $input = $request->except(['_token']);
        Userbranch::create($input);
    
        return redirect()->route('userbranches.index')
            ->with('success','User Branches created successfully.');
    }

   
    public function show($id)
    {
        $post = Business::find($id);

        return view('userbranches.show', compact('post'));
    }

    public function edit($id)
    {
        $post = Userbranch::find($id);
        $branch = Branch::where('status','=',1)->pluck('name', 'id')->all();
        $countries = Countries::pluck('name', 'id')->all();
        $state = State::where('country_id', $post->country_id)->pluck('name', 'id')->all();
        $city = Cities::where('state_id', $post->state_id)->pluck('name', 'id')->all();
        $user = User::where('status','=',1)->pluck('name', 'id')->all();
        
        return view('userbranches.edit',compact('post','branch','user','countries','state','city'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'branch_id' => 'required',
            'user_id' => 'required',
            'country_id' => 'required',
            'state_id' => 'required',
            'city' => 'required',
        ]);

        $post = Userbranch::find($id);
        $input = $request->except(['_token']);
        $post->update($input);
    
        return redirect()->route('userbranches.index')
            ->with('success', 'User Branches updated successfully.');
    }

    public function destroy($id)
    {
        Userbranch::find($id)->update(array('status' => 0));
        return redirect()->route('userbranches.index')
            ->with('success', 'User Branches deleted successfully.');
    }
}