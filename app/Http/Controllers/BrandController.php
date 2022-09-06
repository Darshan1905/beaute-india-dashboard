<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use Auth;
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

    public function brandList() {
        $industry = Brand::get();
        return datatables()->of($industry)
            ->editColumn('created_at', '{{ date("d-m-Y", strtotime($created_at)) }}')
            ->editColumn('status', function($row) {
                            return $row->status == 1 ? '<span class="badge badge-success">Active</span>' : '<span class="badge badge-danger">In-Active</span>';
                        })
            ->addColumn('action', function($row) {
                $btn = '';
                $btn .= '<div class="btn-group">';
                $btn .= ' <a class="btn btn-primary" href="' . route('brands.edit', [$row->id]) . '">Edit</a>';
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
        return view('brands.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);
        $input = $request->except(['_token']);
        $input['user_id'] = Auth::user()->id;
        Brand::create($input);
    
        return redirect()->route('brands.index')
            ->with('success','Brand created successfully.');
    }

   
    public function show($id)
    {
        $post = Brand::find($id);

        return view('brands.show', compact('post'));
    }

    public function edit($id)
    {
        $post = Brand::find($id);
        return view('brands.edit',compact('post'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);

        $post = Brand::find($id);
    
        $post->update($request->all());
    
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