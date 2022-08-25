<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use Illuminate\Http\Request;
use App\Models\Businessactivitie;
use App\Models\Business;
use App\Models\Categorie;
use App\Models\Subcategorie;

class SubcategoryController extends Controller
{
    
    function __construct()
    {
         $this->middleware('permission:subcategorys-list|subcategorys-create|subcategorys-edit|subcategorys-delete', ['only' => ['index', 'show']]);
         $this->middleware('permission:subcategorys-create', ['only' => ['create', 'store']]);
         $this->middleware('permission:subcategorys-edit', ['only' => ['edit', 'update']]);
         $this->middleware('permission:subcategorys-delete', ['only' => ['destroy']]);
    }

   
    public function index(Request $request)
    {
        return view('subcategorys.index');
    }

    public function subcategorysList() {
        $industry = Subcategorie::get();
        
        return datatables()->of($industry)
            ->editColumn('created_at', '{{ date("d-m-Y", strtotime($created_at)) }}')
            ->editColumn('category', function($row) {
                return Categorie::where('id','=',$row->category_id)->first()->category_name; })
            ->addColumn('action', function($row) {
                $btn = '';
                $btn .= '<div class="btn-group">';
                $btn .= ' <a class="btn btn-primary" href="' . route('subcategorys.edit', [$row->id]) . '">Edit</a>';
                return $btn;
            })
            
            ->rawColumns([
                'sub_category_name' => 'sub_category_name',
                'category' => 'category',
                'sub_category_code' => 'sub_category_code',
                'action' => 'action'
            ])
            ->make(true);
    }

    
    public function create()
    {
        
        $businessactivitie = Businessactivitie::where('status','=',1)->pluck('name', 'id')->all();
        $business = Business::where('status','=',1)->pluck('name', 'id')->all();
        $category = Categorie::where('status','=',1)->pluck('category_name', 'id')->all();
        return view('subcategorys.create',compact('businessactivitie','business','category'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'sub_category_code' => 'required',
            'bussiness_id'=>'required',
            'category_id'=>'required',
            'sub_category_name'=>'required'
        ]);
        $input = $request->except(['_token']);
    
        Subcategorie::create($input);
    
        return redirect()->route('subcategorys.index')
            ->with('success','sub Category created successfully.');
    }

   
    public function show($id)
    {
        $post = Subcategorie::find($id);

        return view('subcategorys.show', compact('post'));
    }

    public function edit($id)
    {
        $post = Subcategorie::find($id);
        $businessactivitie = Businessactivitie::where('status','=',1)->pluck('name', 'id')->all();
        $category = Categorie::where('status','=',1)->pluck('category_name', 'id')->all();
        $business = Business::where('status','=',1)->pluck('name', 'id')->all();
       

        return view('subcategorys.edit',compact('post','businessactivitie','business','category'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'bussiness_id'=>'required',
            'category_id'=>'required',
            'sub_category_name'=>'required'
        ]);

        $post = Subcategorie::find($id);
    
        $post->update($request->all());
    
        return redirect()->route('subcategorys.index')
            ->with('success', 'Sub Category updated successfully.');
    }

    public function destroy($id)
    {
        Branch::find($id)->update(array('status' => 0));
        return redirect()->route('subcategorys.index')
            ->with('success', 'Category deleted successfully.');
    }
}