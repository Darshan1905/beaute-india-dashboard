<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categorie;
use App\Models\Product;
use App\Models\Size;
use App\Models\Color;
use App\Models\User;
use App\Models\Brand;
use App\Models\Otherimage;
use App\Models\Vendor;
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
           $industry = Product::with('brand','vendor','category','size')->orderBy('id','DESC')->get();
        }else{
          
           $industry = Product::with('brand','vendor','category','size')->where('shop_id', Auth::user()->shop_id)->orderBy('id','DESC')->get();
        }
       
        return datatables()->of($industry)
            ->editColumn('created_at', '{{ date("d-m-Y", strtotime($created_at)) }}')
            ->editColumn('image', function($row) {
                return '<img src="'.$row->image.'" style="width: 50px; height:50px;">'; })
            ->editColumn('category', function($row) {
                return $row->category->name; })
            ->editColumn('status', function($row) {
                            return $row->status == 1 ? '<span class="badge badge-success">Active</span>' : '<span class="badge badge-danger">In-Active</span>';
                        })
            ->addIndexColumn()
            ->addColumn('action', function($row) {
                $btn = '';
                $btn .= '<div class="btn-group">';
                $btn .= ' <a class="btn btn-primary" href="' . route('product.edit', [$row->id]) . '">Edit</a>';
                return $btn;
            })
            
            ->rawColumns([
                'status' => 'status',
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
        $size = Size::where('status','=',1)->pluck('name', 'id')->all();
        $color = Color::where('status','=',1)->pluck('name', 'id')->all();
        $brand = Brand::where('status','=',1)->pluck('name', 'id')->all();
        $vendor = Vendor::where('status','=',1)->pluck('name', 'id')->all();
        return view('product.create',compact('category','shop','size','color','brand','vendor')); 
    }

    public function store(Request $request)
    {
       
        $input = $request->except(['_token']);
        if($request->file('image')){
            $file= $request->file('image');
            $extension = $request->file('image')->getClientOriginalExtension();
            $filename = date('YmdHi'). '_'. rand('0000','9999').'.'.$extension;
            $file->move(public_path('image/'), $filename);
            $input['image']= URL::to('/').'/image/'.$filename;
        }
        unset($input['otherimages']);
        $result = Product::create($input);
        if($request->file('other_img'))
         {
            foreach($request->file('other_img') as $file)
            {   
                $extension =  $file->getClientOriginalExtension();
                $name = date('YmdHi'). '_'. rand('0000','9999').'.'.$extension;
                $file->move(public_path('upload_image/'), $name);  
                Otherimage::create(array('product_id'=>$result->id,'image' => URL::to('/').'/image/'.$name));
            }
         }
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
        $vendor = Vendor::pluck('name', 'id')->all();
        $size = Size::where('status','=',1)->pluck('name', 'id')->all();
        $color = Color::where('status','=',1)->pluck('name', 'id')->all();
        $brand = Brand::where('status','=',1)->pluck('name', 'id')->all();
        $images = Otherimage::where('product_id','=',$post->id)->get();
        return view('product.edit',compact('post','category','shop','vendor','size','color','brand','images'));
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
            $input['image']= URL::to('/').'/image/'.$filename;
        }

         if($request->file('other_img'))
         {
            foreach($request->file('other_img') as $file)
            {
                $extension =  $file->getClientOriginalExtension();
                $name = date('YmdHi'). '_'. rand('0000','9999').'.'.$extension;
                $file->move(public_path('image/'), $name);  
                Otherimage::create(array('product_id'=>$id,'image' => URL::to('/').'/image/'.$name));
            }
         }
         unset($input['otherimages']);
       
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

     public function deleteimage($id)
    {
        Otherimage::find($id)->delete();
        return redirect()->back()
            ->with('success', 'product deleted successfully.');
    }
}