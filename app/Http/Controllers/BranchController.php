<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use Illuminate\Http\Request;
use App\Models\Businessactivitie;
use App\Models\Countries;
use App\Models\State;
use App\Models\Cities;
use App\Models\Business;

class BranchController extends Controller
{
    
    function __construct()
    {
         $this->middleware('permission:branches-list|branches-create|branches-edit|branches-delete', ['only' => ['index', 'show']]);
         $this->middleware('permission:branches-create', ['only' => ['create', 'store']]);
         $this->middleware('permission:branches-edit', ['only' => ['edit', 'update']]);
         $this->middleware('permission:branches-delete', ['only' => ['destroy']]);
    }

   
    public function index(Request $request)
    {
        return view('branches.index');
    }

    public function branchesList() {
        $industry = Branch::get();
        return datatables()->of($industry)
            ->editColumn('created_at', '{{ date("d-m-Y", strtotime($created_at)) }}')
            ->editColumn('bussiness', function($row) {
                return Business::where('id','=',$row->business)->first()->name; })

            ->editColumn('bussinessactivity', function($row) {
                    return Businessactivitie::where('id','=',$row->business_activity_id)->first()->name; })

            ->editColumn('status', function($row) {
                return $row->status == 1 ? '<span class="badge badge-success">Active</span>' : '<span class="badge badge-danger">In-Active</span>';
            })
            ->addColumn('action', function($row) {
                $btn = '';
                $btn .= '<div class="btn-group">';
                $btn .= ' <a class="btn btn-primary" href="' . route('branches.edit', [$row->id]) . '">Edit</a>';
                return $btn;
            })
            ->rawColumns([
                'bussiness' => 'bussiness',
                'bussinessactivity' => 'bussinessactivity',
                'status' => 'status',
                'action' => 'action'
            ])
            ->make(true);
    }

    
    public function create()
    {
        
        $businessactivitie = Businessactivitie::where('status','=',1)->pluck('name', 'id')->all();
        $business = Business::where('status','=',1)->pluck('name', 'id')->all();
        $countries = Countries::pluck('name', 'id')->all();
        return view('branches.create',compact('businessactivitie','business','countries'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);
        $input = $request->except(['_token']);
    
        Branch::create($input);
    
        return redirect()->route('branches.index')
            ->with('success','Branch created successfully.');
    }

   
    public function show($id)
    {
        $post = Branch::find($id);

        return view('branches.show', compact('post'));
    }

    public function edit($id)
    {
        $post = Branch::find($id);
        $businessactivitie = Businessactivitie::where('status','=',1)->pluck('name', 'id')->all();
        $business = Business::where('status','=',1)->pluck('name', 'id')->all();
       

        return view('branches.edit',compact('post','businessactivitie','business'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);

        $post = Branch::find($id);
    
        $post->update($request->all());
    
        return redirect()->route('branches.index')
            ->with('success', 'TAX updated successfully.');
    }

    public function destroy($id)
    {
        Branch::find($id)->update(array('status' => 0));
        return redirect()->route('branches.index')
            ->with('success', 'TAX deleted successfully.');
    }
}