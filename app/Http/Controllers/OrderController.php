<?php

namespace App\Http\Controllers;

use App\Models\Address;
use Illuminate\Http\Request;
use App\Models\Categorie;
use App\Models\Product;
use App\Models\User;
use App\Models\Brand;
use App\Models\Cities;
use App\Models\Giftcard;
use App\Models\Order_status;
use App\Models\Order_product;
use App\Models\Otherimage;
use App\Models\Order;
use App\Models\Orders;
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
        $or = Orders::get();
        //$or = Order::get();
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



            // ->editColumn('name', function ($row) {
            //     if (isset(User::where('id', '=', $row->customer_id)->first()->name)) {
            //         return User::where('id', '=', $row->customer_id)->first()->name;
            //     }
            // })

            // ->editColumn('email', function ($row) {
            //     if (isset(User::where('id', '=', $row->customer_id)->first()->email)) {
            //         return User::where('id', '=', $row->customer_id)->first()->email;
            //     }
            // })
            // ->editColumn('address', function ($row) {
            //     if (isset(User::where('id', '=', $row->customer_id)->first()->address)) {
            //         return User::where('id', '=', $row->customer_id)->first()->address;
            //     }

            // })
            // ->editColumn('product', function ($row) {
            //     if (isset(Order_product::where('order_id', '=', $row->id)->first()->product_id)) {
            //         $p_id =  Order_product::where('order_id', '=', $row->id)->first()->product_id ;
            //         // dd($p_id);
            //         $p_id =  Product::where('id', '=', $p_id);
            //         return $p_id->name;
            //     }
            // })


            ->editColumn('brands', function($row) {
                            if(isset(brand::where('id','=',$row->brands)->first()->name))
                            { return brand::where('id','=',$row->brands)->first()->name;} })

             ->editColumn('order_product', function($row) {
                        if(isset(order_product::where('id','=',$row->product_id )->first()->product_id ))
                        { return order_product::where('id','=',$row->product_id )->first()->product_id ;} })
    
             ->editColumn('product', function($row) {
                            if(isset(product::where('id','=',$row->name)->first()->name))
                            { return product::where('id','=',$row->name)->first()->name;} })
            
                ->editColumn('product', function($row) {
                                if(isset(product::where('id','=',$row->shipping_price)->first()->shipping_price))
                                { return product::where('id','=',$row->shipping_price)->first()->shipping_price;} })
                ->editColumn('product', function($row) {
                                    if(isset(product::where('id','=',$row->name)->first()->name))
                                    { return product::where('id','=',$row->name)->first()->name;} })
            
        
           ->editColumn('address', function ($row) {
                if (isset(User::where('id', '=', $row->customer_id)->first()->address)) {
                    return User::where('id', '=', $row->customer_id)->first()->address;
                }

            })
               
            ->editColumn('users', function($row) {
                        if(isset( user::where('id','=',$row->name)->first()->name))
                            { return  user::where('id','=',$row->name)->first()->name ;} })
        

            ->editColumn('users', function($row) {
                        if(isset( user::where('id','=',$row->email )->first()->email ))
                        { return  user::where('id','=',$row->email )->first()->email ;} })

            ->editColumn('users', function($row) {
                            if(isset( user::where('id','=',$row->contact )->first()->contact ))
                            { return  user::where('id','=',$row->contact )->first()->contact ;} })

            ->editColumn('addresses', function($row) {
                    if(isset( Address::where('id','=',$row->type )->first()->type ))
                        { return  Address::where('id','=',$row->type )->first()->type ;} })
            

            ->editColumn('users', function($row) {
                                if(isset( user::where('id','=',$row->address )->first()->address ))
                                { return  user::where('id','=',$row->address )->first()->address ;} })

            ->editColumn('cities', function($row) {
                                    if(isset( Cities::where('id','=',$row->name )->first()->name ))
                                    { return  cities::where('id','=',$row->name )->first()->name ;} })
            ->editColumn('orders', function($row) {
                                        if(isset( orders::where('id','=',$row->discount )->first()->discount ))
                                        { return  orders::where('id','=',$row->discount )->first()->discount ;} })
            ->editColumn('giftcards', function($row) {
                                            if(isset( Giftcard::where('id','=',$row->giftcode )->first()->giftcode ))
                                            { return  giftcard::where('id','=',$row->giftcode )->first()->giftcode ;} })
    
             ->editColumn('order_products', function($row) {
                     if(isset( order_product::where('id','=',$row->unit_price )->first()->unit_price ))
                        { return  order_product::where('id','=',$row->unit_price )->first()->unit_price ;} })
        
            ->editColumn('addresses', function($row) {
                            if(isset( Address::where('id','=',$row->type )->first()->type ))
                               { return  Address::where('id','=',$row->type )->first()->type ;} })
               
                                         
            
            ->editColumn('shop_id', function($row) {
                if(isset(User::where('id','=',$row->shop_id)->first()->shopname)){ return User::where('id','=',$row->shop_id)->first()->shopname;} })
                                      

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
                'brands'=>'brands',
                'product_name'=>'product_name',
                'product_quantity'=>'product_quantity',
                'sku_no'=>'sku_no',
                'sale_price'=>'sale_price',
                'product_table'=>'product_table',
                'action' => 'action',
                // 'product_name'=>'product_name',
                'customer_name'=>'customer_name',
                'customer_email'=>'customer_email',
                'customer_contact'=>'customer_contact',
                'address'=>'address',
                'shipping_price'=>'shipping_price',
                'order_product'=>'order_product',
                'state'=>'state',
                'cities'=>'cities',
                'Discount'=>'Discount',
                'coupon_code'=>'coupon_code',
                'price mrp'=>'normal price',
                'Payment method'=>'type',

                
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