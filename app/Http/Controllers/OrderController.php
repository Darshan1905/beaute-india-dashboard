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
            ->editColumn('customer_name', function($row) {
            return User::where('id','=',$row->customer_id)->first()->name; })
            ->editColumn('customer_contact', function($row) {
            return User::where('id','=',$row->customer_id)->first()->contact; })
            ->editColumn('customer_email', function($row) {
                return User::where('id','=',$row->customer_id)->first()->email; })
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
                'customer_name' => 'customer_name',
                'customer_contact' => 'customer_contact',
                'customer_email' => 'customer_email',
                'action' => 'action'
            ])
            ->make(true);
    }

   
    public function invoice($id)
    {
        $post = Order::find($id);
        $product = Order_product::where('order_id',$id)->with('product_detail')->get();
        return $post;
        return view('orders.invoice', compact('post','product'));
    }
}