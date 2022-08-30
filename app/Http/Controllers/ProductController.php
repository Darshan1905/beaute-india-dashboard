<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categorie;
use App\Models\Product;
use App\Models\User;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ImportProduct;
use URL;
use Auth;
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

        $category = Categorie::where('status','=',1)->get();
        return view('product.index',compact('category'));
    }

    public function productList() {
         if(Auth::user()->type == 'admin'){
           $industry = Product::orderBy('id','DESC')->get();
        }else{
          
           $industry = Product::where('shop_id', Auth::user()->shop_id)->orderBy('id','DESC')->get();
        }
       
        return datatables()->of($industry)
            ->editColumn('created_at', '{{ date("d-m-Y", strtotime($created_at)) }}')
            ->editColumn('image', function($row) {
                return '<img src="'.URL::to('/').'/'.$row->image.'" style="width: 50px; height:50px;">'; })
            ->editColumn('category', function($row) {
                return Categorie::where('id','=',$row->category_id)->first()->name; })

            ->addIndexColumn()
            ->addColumn('action', function($row) {
                $btn = '';
                $btn .= '<div class="btn-group">';
                $btn .= ' <a class="btn btn-primary" href="' . route('product.edit', [$row->id]) . '">Edit</a>';
                return $btn;
            })
            
            ->rawColumns([
                'image' => 'image',
                'category' => 'category',
                'action' => 'action'
            ])
            ->make(true);
    }

    
    public function create()
    {
        $shop = User::where(array('status' => 1,'type' => 'shop'))->pluck('name', 'id')->all();
        $category = Categorie::where('status','=',1)->pluck('name', 'id')->all();
        return view('product.create',compact('category','shop'));
    }

    public function store(Request $request)
    {
       
        $input = $request->except(['_token']);
        if($request->file('image')){
            $file= $request->file('image');
            $extension = $request->file('image')->getClientOriginalExtension();
            $filename = date('YmdHi'). '_'. rand('0000','9999').'.'.$extension;
            $file->move(public_path('image/'), $filename);
            $input['image']= 'public/image/'.$filename;
        }
        $result = Product::create($input);
        Product::where('id',$result->id)->update(array('sku_no' => 'PRO'.'0000'.$result->id));
        return redirect()->route('product.index')
            ->with('success','product created successfully.');
    }

   
    public function show($id)
    {
        $post = Product::find($id);
          
        return view('product.show', compact('post'));
    }

    public function edit($id)
    {
        $post = Product::find($id);
        $shop = User::where(array('status' => 1,'type' => 'shop'))->pluck('name', 'id')->all();
        $category = Categorie::where('status','=',1)->pluck('name', 'id')->all();
        return view('product.edit',compact('post','category','shop'));
    }

    public function update(Request $request, $id)
    {
      

        $post = Product::find($id);
        $input = $request->except(['_token']);
        if($request->file('image')){
            $file= $request->file('image');
            $extension = $request->file('image')->getClientOriginalExtension();
            $filename = date('YmdHi'). '_'. rand('0000','9999').'.'.$extension;
            $file->move(public_path('image/'), $filename);
            $input['image']= 'public/image/'.$filename;
        }
    
        $post->update($input);
    
        return redirect()->route('product.index')
            ->with('success', 'product updated successfully.');
    }

     public function import(Request $request){

       $path1 = $request->file('file')->store('temp'); 

       $path=storage_path('app').'/'.$path1; 
       $resuilt = Excel::import(new ImportProduct, $path);      
       
        return redirect()->back();         

    }


    public function destroy($id)
    {
        Product::find($id)->update(array('status' => 0));
        return redirect()->route('product.index')
            ->with('success', 'product deleted successfully.');
    }
}