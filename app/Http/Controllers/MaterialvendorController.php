<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Materialvendor;
use App\Models\Material;
use App\Models\Vendor;
class MaterialvendorController extends Controller
{
    
    function __construct()
    {
         $this->middleware('permission:materialvendor-list|materialvendor-create|materialvendor-edit|materialvendor-delete', ['only' => ['index', 'show']]);
         $this->middleware('permission:materialvendor-create', ['only' => ['create', 'store']]);
         $this->middleware('permission:materialvendor-edit', ['only' => ['edit', 'update']]);
         $this->middleware('permission:materialvendor-delete', ['only' => ['destroy']]);
    }

   
    public function index(Request $request)
    {
        return view('materialvendor.index');
    }

    public function materialvendorList() {
        $industry = Materialvendor::get();
        return datatables()->of($industry)
            ->editColumn('created_at', '{{ date("d-m-Y", strtotime($created_at)) }}')
            ->editColumn('material', function($row) {
                return Material::where('id','=',$row->material_id)->first()->name; })
            ->editColumn('vendor', function($row) {
                return Vendor::where('id','=',$row->vendor_id)->first()->name; })
            ->addColumn('action', function($row) {
                $btn = '';
                $btn .= '<div class="btn-group">';
                $btn .= ' <a class="btn btn-primary" href="' . route('materialvendor.edit', [$row->id]) . '">Edit</a>';
                return $btn;
            })
            ->editColumn('status', function($row) {
                return $row->status == 1 ? '<span class="badge badge-success">Active</span>' : '<span class="badge badge-danger">In-Active</span>';
            })
            ->rawColumns([
                'vendor' => 'vendor',
                'material' => 'material',
                'status' => 'status',
                'action' => 'action'
            ])
            ->make(true);
    }

    
    public function create()
    {
        $vendor = Vendor::where('status','=',1)->pluck('name', 'id')->all();
        $material = Material::where('status','=',1)->pluck('name', 'id')->all();
        return view('materialvendor.create',compact('vendor','material'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'vendor_id' => 'required',
            'material_id'=>'required',
        ]);
        $input = $request->except(['_token']);
    
        Materialvendor::create($input);
    
        return redirect()->route('materialvendor.index')
            ->with('success','Material Vendor created successfully.');
    }

   
    public function show($id)
    {
        $post = Materialvendor::find($id);

        return view('category.show', compact('post'));
    }

    public function edit($id)
    {
        $post = Materialvendor::find($id);
        $vendor = Vendor::where('status','=',1)->pluck('name', 'id')->all();
        $material = Material::where('status','=',1)->pluck('name', 'id')->all();
       

        return view('materialvendor.edit',compact('post','vendor','material'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'vendor_id' => 'required',
            'material_id'=>'required',
        ]);

        $post = Materialvendor::find($id);
    
        $post->update($request->all());
    
        return redirect()->route('materialvendor.index')
            ->with('success', 'Material Vendor updated successfully.');
    }

    public function destroy($id)
    {
        Materialvendor::find($id)->update(array('status' => 0));
        return redirect()->route('materialvendor.index')
            ->with('success', 'Material Vendor deleted successfully.');
    }
}