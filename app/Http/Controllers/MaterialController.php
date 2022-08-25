<?php

namespace App\Http\Controllers;

use App\Models\Material;
use Illuminate\Http\Request;
use App\Models\Branch;
use App\Models\Brand;
use App\Models\Businessactivitie;
use App\Models\Business;
use App\Models\Categorie;
use App\Models\Subcategorie;
use App\Models\Materialvendor;
use App\Models\Vendor;
use App\Models\Customermaster;
use App\Models\Uom;
class MaterialController extends Controller{
    
    function __construct(){
         $this->middleware('permission:material-list|material-create|material-edit|material-delete', ['only' => ['index', 'show']]);
         $this->middleware('permission:material-create', ['only' => ['create', 'store']]);
         $this->middleware('permission:material-edit', ['only' => ['edit', 'update']]);
         $this->middleware('permission:material-delete', ['only' => ['destroy']]);
    }

   
    public function index(Request $request)
    {
        return view('material.index');
    }

    public function materialList() {
        $material = Material::get();
        return datatables()->of($material)
                        ->editColumn('created_at', '{{ date("d-m-Y", strtotime($created_at)) }}')
                        ->editColumn('business', function($row) {
                            return Business::where('id','=',$row->business_id)->first()->name; })
                        ->editColumn('categorie', function($row) {
                            return Categorie::where('id','=',$row->category_id)->first()->category_name; })
                        ->editColumn('subcategorie', function($row) {
                            return Subcategorie::where('id','=',$row->subcategory_id)->first()->sub_category_name; })
                        ->editColumn('brand', function($row) {
                            return Brand::where('id','=',$row->brand_id)->first()->name; })
                        ->editColumn('uom', function($row) {
                            return Uom::where('id','=',$row->uom_id)->first()->name; })
         
                       ->editColumn('status', function($row) {
                            return $row->status == 1 ? '<span class="badge badge-success">Active</span>' : '<span class="badge badge-danger">In-Active</span>';
                        })
                        ->addColumn('action', function($row) {
                            $btn = '';
                            $btn .= '<div class="btn-group">';
                            $btn .= ' <a class="btn btn-primary" href="' . route('material.edit', [$row->id]) . '">Edit</a>';
                            return $btn;
                        })
                        ->rawColumns([
                            'business' => 'business',
                            'categorie' => 'categorie',
                            'subcategorie' => 'subcategorie',
                            'brand' => 'brand',
                            'uom' => 'uom',
                            'status' => 'status',
                            'created_at' => 'created_at',
                            'action' => 'action'
                        ])
                        ->make(true);
    }

    
    public function create(){
        $subcategorie = Subcategorie::where('status','=',1)->pluck('sub_category_name', 'id')->all();
        $bussiness = Business::where('status','=',1)->pluck('name', 'id')->all();
        $brand = Brand::where('status','=',1)->pluck('name', 'id')->all();
        $uom = Uom::where('status','=',1)->pluck('name', 'id')->all();
        $category = Categorie::where('status','=',1)->pluck('category_name', 'id')->all();
        return view('material.create',compact('subcategorie','bussiness','brand','uom','category'));
    }

    public function store(Request $request){
        $this->validate($request, [
            'name' => 'required'
        ]);
        $st =0;
        $st =  Material::count();
        $st =$st+1;
        
        $category=Categorie::where('id','=',$request['category_id'])->pluck('category_name')->first();
        $subcategorie = Subcategorie::where('id','=',$request['subcategory_id'])->pluck('sub_category_name')->first();
        $brand = Brand::where('id','=',$request['brand_id'])->pluck('name')->first();
       $cat = strtoupper(substr($category, 0, 2));
       $sub = strtoupper(substr($subcategorie, 0, 2));
       $br =  strtoupper(substr($brand, 0, 3));
      
    
        $request['code'] = rand(10,90).'-'.$cat.'-'.$sub.'-'.$br.'-'.'00000'.$st; 
        
        $input = $request->except(['_token']);
      
        Material::create($input);
    
        return redirect()->route('material.index')
            ->with('success','Material created successfully.');
    }

   
    public function show($id){
        $post = Customermaster::find($id);

        return view('material.show', compact('post'));
    }

    public function edit($id){
        $post = Material::find($id); 
        $subcategorie = Subcategorie::where('status','=',1)->pluck('sub_category_name', 'id')->all();
        $bussiness = Business::where('status','=',1)->pluck('name', 'id')->all();
        $brand = Brand::where('status','=',1)->pluck('name', 'id')->all();
        $uom = Uom::where('status','=',1)->pluck('name', 'id')->all();
        $category = Categorie::where('status','=',1)->pluck('category_name', 'id')->all();
        return view('material.edit',compact('post','subcategorie','bussiness','brand','uom','category'));
    }

    public function update(Request $request, $id){
        $this->validate($request, [
            'name' => 'required',
           
        ]);

        $post = customermaster::find($id);
        $input = $request->except(['_token']);
        $post->update($input);
    
        return redirect()->route('material.index')
            ->with('success', 'Customer Master updated successfully.');
    }

    public function destroy($id){
        material::find($id)->update(array('status' => 0));
        return redirect()->route('material.index')
            ->with('success', 'Customer Master deleted successfully.');
    }
}