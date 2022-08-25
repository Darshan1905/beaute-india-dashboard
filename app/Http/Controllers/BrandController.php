<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Business;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    
    function __construct()
    {
         $this->middleware('permission:brands-list|brands-create|brands-edit|brands-delete', ['only' => ['index', 'show']]);
         $this->middleware('permission:brands-create', ['only' => ['create', 'store']]);
         $this->middleware('permission:brands-edit', ['only' => ['edit', 'update']]);
         $this->middleware('permission:brands-delete', ['only' => ['destroy']]);
    }

   
    public function index(Request $request)
    {
        return view('brands.index');
    }

    public function brandsList() {
        $industry = Brand::get();
        return datatables()->of($industry)
                        ->editColumn('created_at', '{{ date("d-m-Y", strtotime($created_at)) }}')
                        ->editColumn('business', function($row) {
                            return Business::where('id','=',$row->business)->first()->name; })

                        
                       ->editColumn('status', function($row) {
                            return $row->status == 1 ? '<span class="badge badge-success">Active</span>' : '<span class="badge badge-danger">In-Active</span>';
                        })
                        ->addColumn('action', function($row) {
                            $btn = '';
                            $btn .= '<div class="btn-group">';
                            $btn .= ' <a class="btn btn-primary" href="' . route('brands.edit', [$row->id]) . '">Edit</a>';
                            return $btn;
                        })
                        ->rawColumns([
                            'business' => 'business',
                            'status' => 'status',
                            'action' => 'action'
                        ])
                        ->make(true);
    }

    
    public function create()
    {   
        $business = Business::where('status','=',1)->pluck('name', 'id')->all();
        return view('brands.create',compact('business'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'business' => 'required',
            'name' => 'required',
            'companyname' => 'required',
            'brandcode' => 'required',
        ]);

      
        $input = $request->except(['_token']);
        Brand::create($input);
    
        return redirect()->route('brands.index')
            ->with('success','Brand Branches created successfully.');
    }

   
    public function show($id)
    {
        $post = Business::find($id);

        return view('brands.show', compact('post'));
    }

    public function edit($id)
    {
        $post = Brand::find($id);
        $business = Business::where('status','=',1)->pluck('name', 'id')->all();
        
        return view('brands.edit',compact('business','post'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'business' => 'required',
            'name' => 'required',
            'companyname' => 'required',
            'brandcode' => 'required',
        ]);

        $post = Brand::find($id);
        $input = $request->except(['_token']);
        $post->update($input);
    
        return redirect()->route('brands.index')
            ->with('success', 'Brand updated successfully.');
    }

    public function destroy($id)
    {
        Brand::find($id)->update(array('status' => 0));
        return redirect()->route('brands.index')
            ->with('success', 'Brand deleted successfully.');
    }
}