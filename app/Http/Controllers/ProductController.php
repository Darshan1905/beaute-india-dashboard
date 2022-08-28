<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categorie;
use App\Models\Product;

class ProductController extends Controller
{
    
    function __construct()
    {
         $this->middleware('permission:product-list|product-create|product-edit|product-delete', ['only' => ['index', 'show']]);
         $this->middleware('permission:product-create', ['only' => ['create', 'store']]);
         $this->middleware('permission:product-edit', ['only' => ['edit', 'update']]);
         $this->middleware('permission:product-delete', ['only' => ['destroy']]);
    }

   
    public function index(Request $request)
    {
        return view('product.index');
    }

    public function productList() {
        $industry = Product::get();
        
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
        
        $category = Categorie::where('status','=',1)->pluck('name', 'id')->all();
        return view('product.create',compact('category'));
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
    
        return redirect()->route('product.index')
            ->with('success','product created successfully.');
    }

   
    public function show($id)
    {
        $post = Subcategorie::find($id);

        return view('product.show', compact('post'));
    }

    public function edit($id)
    {
        $post = Subcategorie::find($id);
        $businessactivitie = Businessactivitie::where('status','=',1)->pluck('name', 'id')->all();
        $category = Categorie::where('status','=',1)->pluck('category_name', 'id')->all();
        $business = Business::where('status','=',1)->pluck('name', 'id')->all();
       

        return view('product.edit',compact('post','businessactivitie','business','category'));
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
    
        return redirect()->route('product.index')
            ->with('success', 'product updated successfully.');
    }

    public function destroy($id)
    {
        Branch::find($id)->update(array('status' => 0));
        return redirect()->route('product.index')
            ->with('success', 'product deleted successfully.');
    }
}