<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categorie;
use App\Models\Product;
use App\Models\User;
use App\Models\Brand;
use App\Models\Order_status;
use App\Models\Order_product;
use App\Models\Otherimage;
use App\Models\Order;
use URL;
use Auth;
class OrderController extends Controller
{
    
    function __construct()
    {
         $this->middleware('permission:order-list', ['only' => ['index']]);
    }

   
    public function index(Request $request)
    {

        $category = Categorie::where('status','=',1)->get();
        $or = Order::get();
        return view('orders.index',compact('category'));
    }

    public function ordersList() {
         if(Auth::user()->type == 'admin'){
           $industry = Order::orderBy('id','DESC')->get();
        }else{
           $industry = Order::where('shop_id', Auth::user()->shop_id)->orderBy('id','DESC')->get();
        }
       
        return datatables()->of($industry)
            ->editColumn('created_at', '{{ date("d-m-Y", strtotime($created_at)) }}')
            ->editColumn('shop_id', function($row) {
                   if(isset(User::where('id','=',$row->shop_id)->first()->shopname)){ return User::where('id','=',$row->shop_id)->first()->shopname;} })

            ->editColumn('shipping_address', function($row) {
                $add = json_decode($row->shipping_address);
            return $add->address.'<br>'.$add->country.',<br>'.$add->state.',<br>'.$add->city.',<br>'.$add->zip; })

            ->editColumn('billing_address', function($row) {
                $add2 = json_decode($row->billing_address);
            return $add2->address.'<br>'.$add2->country.',<br>'.$add2->state.',<br>'.$add2->city.',<br>'.$add2->zip; })

            ->editColumn('status', function($row) {
            return '<span style="color: '.Order_status::where('id','=',$row->status)->first()->color.'">'.Order_status::where('id','=',$row->status)->first()->name.'</span>'; })
        
            ->addIndexColumn()
            ->addColumn('action', function($row) {
                $btn = '';
                $btn .= '<div class="btn-group">';
                $btn .= ' <a class="btn btn-primary" target="_blank" href="' . route('order.invoice', [$row->id]) . '">Invoice</a>';
                return $btn;
            })
            
            ->rawColumns([
                'status' => 'status',
                'shop_id' => 'shop_id',
                'shipping_address' => 'shipping_address',
                'billing_address' => 'billing_address',
                'action' => 'action'
            ])
            ->make(true);
    }

   
    public function invoice($id)
    {
        $post = Order::find($id);
        $product = Order_product::where('order_id',$id)->with('product_detail')->get();
        // return $post;
        return view('orders.invoice', compact('post','product'));
    }
}