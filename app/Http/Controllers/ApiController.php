<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Session;
use Stripe;
use DB;
use Validator; 
use Mail;
//use Request;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Address;
use App\Models\Newsletter;
use App\Models\Product;
use App\Models\Order;
use App\Models\Band;
use App\Models\Size;
use App\Models\Categorie;
use App\Models\Order_product;
use App\Models\Order_status;
use App\Models\Giftcard;
use App\Models\Cart;
use Illuminate\Support\Facades\Crypt;

use Closure;
use URL;
 
class ApiController extends Controller {  

    public function sendResponse($result, $message)
    {
        $response = [
            'success' => true,
            'data'    => $result,
            'message' => $message,
        ];
 

        return response()->json($response, 200);
    }

    public function sendError($error, $errorMessages = [], $code = 400)
    {
        $response = [
            'success' => false,
            'message' => $error,
        ];


        if(!empty($errorMessages)){
            $response['data'] = $errorMessages;
        }


        return response()->json($response, $code);
    }

       

    public function login(Request $request){
        $input = $request->all();
        $rule = array(
            'email'=>'required',
            'otp'=>'required'
      
        );
        $messages = array();
        $validation = Validator::make($input,$rule, $messages);
        if ($validation->fails()) {
            $message = $validation->messages()->first();
           
            return $this->sendError($message,['error' => 'error occure']);
        }
        try {
             $user = User::where(array('email'=> $input['email'],'otp' => $input['otp']))->first(); 
            
            if($user){ 
               if($user->otp != 0){ 
                $success['token'] =  $user->createToken('MyApp')->plainTextToken; 
                $success['user'] =  $user;
       
                $message = 'Login Successfull';
                return $this->sendResponse($success, $message);
              }else{
                  $message = 'Please Enter Valid OTP';
                  return $this->sendError($message,['error' => 'error occure']);
              }
            }
            $message = 'Please Enter Valid OTP';
            return $this->sendError($message,['error' => 'error occure']);
        } catch (\Exception $e) {
            DB::rollBack();
            $message = $e->getMessage();
            return $this->sendError(false, $message);
        }
    }


     public function shop_login(Request $request){
        $input = $request->all();
        $rule = array(
            'shop_id'=>'required',
            'password'=>'required'
      
        );
        $messages = array();
        $validation = Validator::make($input,$rule, $messages);
        if ($validation->fails()) {
            $message = $validation->messages()->first();
           
            return $this->sendError($message,['error' => 'error occure']);
        }
        try {
    
            $chk_login = DB::table('users')->where( array(
                'id'=>$input['shop_id']
            ))->first();

            if ($chk_login) {
                if (Hash::check($input['password'],$chk_login->password)){
                    $chk_login->token =  Crypt::encryptString($chk_login->id);

                    $message = 'fetch shop Successfull';
                    return $this->sendResponse($chk_login, $message);
                }
               
            }
            $message = 'Please check your shop_id or password';
            return $this->sendError($message,['error' => 'error occure']);
        } catch (\Exception $e) {
            DB::rollBack();
            $message = $e->getMessage();
            return $this->sendError(false, $message);
        }
    }

    
    public function registration(Request $request){
        $input = $request->all(); 
        $rule = array(
            'email'=>'required',
        );
        $messages = array();
        $validation = Validator::make($input,  $rule,  $messages);
        if ($validation->fails()) {
            $message = $validation->messages()->first();
           
            return $this->sendError($message,['error' => 'error occure']);
        }
        try {
             $input['otp'] = rand('1000','9999');
             $input['type'] = 'customer';
             $input['name'] = 'customer';
             $input['password'] = Hash::make('123456');
             $chk_officer_id = DB::table('users')->where('email',$input['email'])->first();
            if (!empty($chk_officer_id)) {
                DB::table('users')->where('email',$input['email'])->update($input);
                $result = 1;
            }else{
                 $result = DB::table('users')->insert($input);
            }
           
            if ($result) {
                  $details = [
                        'title' => 'Your Verification OTP',
                        'body' => 'Your OTP is:'.$input['otp']
                    ];
                   
                    \Mail::to($input['email'])->send(new \App\Mail\MyTestMail($details));
                $message = 'Send OTP Your Email Address Successfull!';
                return $this->sendResponse($input['otp'], $message);
            }
            $message = 'Failed12';
            return $this->sendError(false, $message);
        } catch (\Exception $e) {
            DB::rollBack();
            $message = $e->getMessage();
            return $this->sendError(false, $message);
        }
    }

    public function varify_email(Request $request){
       $input = $request->all();
        $rule = array(
            'email'=>'required'
        );
        $messages = array();
        $validation = Validator::make($input,$rule, $messages);
         if ($validation->fails()) {
            $message = $validation->messages()->first();
           
            return $this->sendError($message,['error' => 'error occure']);
        }
         try {
             $chk_login = DB::table('users')->where( array(
                'email'=>$input['email']
            ))->first();
            if (!empty($chk_login)) {
                $message = 'Otp send to your email id';
              $id = $chk_login->id;
              Session::put('id', $id); 
              $otp = rand(1000,9999);
              $result = DB::table('users')->where('id',$id)->update(array('otp'=>$otp));
              $response = DB::table('users')->where('id',$id)->first();
              $send_otp = $response->otp;
              mail($input['email'],'Reset Password Otp','Your otp for forgot password is '.$send_otp);
              return $this->sendResponse(Null,$message);
            }
            
            $message = 'Please enter valid email id';
            return $this->sendError($message,['error' => 'error occure']);
        } catch (\Exception $e) {
            DB::rollBack();
            $message = $e->getMessage();
            return $this->sendError(false, $message);
        }
    }


    public function verify_otp(Request $request){
        $input = $request->all();
         $rule = array(
            'user_id' => 'required',
            'otp'=>'required'
         );
         $messages = array();
         $validation = Validator::make($input,  $rule, $messages);
          if ($validation->fails()) {
             $message = $validation->messages()->first();
            
             return $this->sendError($message,['error' => 'error occure']);
         }
          try {
            // $id = Session::get('id');
              $chk_otp = DB::table('users')->where( array(
                 'otp'=>$input['otp'],
                 'id'=>$input['user_id']
             ))->first();
             if (!empty($chk_otp)) {
                 $message = 'Otp veryfied';
                 return $this->sendResponse($chk_otp, $message);
             }
             
             $message = 'Please enter valid otp';
             
             return $this->sendError($message,['error' => 'error occure']);
         } catch (\Exception $e) {
             DB::rollBack();
             $message = $e->getMessage();
             return $this->sendError(false, $message);
         }
     }

     public function forgot_password(Request $request){
        $input = $request->all();
         $rule = array(
             'user_id'=>'required',
             'password'=>'required',
             
         );
         $messages = array();
         $validation = Validator::make($input,  $rule, $messages);
          if ($validation->fails()) {
             $message = $validation->messages()->first();
            
             return $this->sendError($message,['error' => 'error occure']);
         }
          try {
               $id = Session::get('id');
               $chk_email = DB::table('users')->where( array(
                'id'=>$input['user_id']
            ))->first();
            if (!empty($chk_email)) {
                   $success = DB::table('users')->where('id',$id)->update(array('otp'=>Null,'password'=>Hash::make($input['password'])));
                   if ($success) {
                     $message = 'Password Change Successfully!';
                     return $this->sendResponse(null,$message);
                   }
          
            }
              $message = 'Wrong User Id';
             return $this->sendError($message,['error' => 'error occure']);
         } catch (\Exception $e) {
             DB::rollBack();
             $message = $e->getMessage();
             return $this->sendError(false, $message);
         }
     }

 
    public function sliderimages(Request $request){
          try {
              if(isset($_GET['shop'])){

              $chk_category = DB::table('sliders')->where(array('status'=>1,'shop_id'=>$_GET['shop']))->get(); 
              }else{
              $chk_category = DB::table('sliders')->where(array('status'=>1))->get();
              }
              if(!empty($chk_category)){
                foreach ($chk_category as $key => $value) {
                    $chk_category[$key]->image = URL::to('/').'/'.$value->image;
                }
              }
             if (!empty($chk_category)) {
                    $message = 'Slider Images fetch successfully';
                    return $this->sendResponse($chk_category, $message);
             }else{
                return $this->sendResponse(null, 'Slider Images not available');
             }
             
            
             
             return $this->sendError($message,['error' => 'error occure']);
         } catch (\Exception $e) {
             DB::rollBack();
             $message = $e->getMessage();
             return $this->sendError(false, $message);
         }
     }

     public function size(Request $request){
          try {
              $chk_category = DB::table('sizes')->where( array(
                 'status'=>1
             ))->get();
             if (!empty($chk_category)) {
                    $message = 'Size fetch successfully';
                    return $this->sendResponse($chk_category, $message);
             }else{
                return $this->sendResponse(null, 'size not available');
             }
             
            
             
             return $this->sendError($message,['error' => 'error occure']);
         } catch (\Exception $e) {
             DB::rollBack();
             $message = $e->getMessage();
             return $this->sendError(false, $message);
         }
     }


     public function brand(Request $request){
          try {

             if(isset($_GET['shop'])){
                $chk_category = DB::table('brands')->where( array(
                 'status'=>1,'shop_id'=>$_GET['shop']
                ))->get();
              }else{
                $chk_category = DB::table('brands')->where( array(
                 'status'=>1
                ))->get();
              }
              
             if (!empty($chk_category)) {
                    $message = 'Brands fetch successfully';
                    return $this->sendResponse($chk_category, $message);
             }else{
                return $this->sendResponse(null, 'brands not available');
             }
             return $this->sendError($message,['error' => 'error occure']);
         } catch (\Exception $e) {
             DB::rollBack();
             $message = $e->getMessage();
             return $this->sendError(false, $message);
         }
     }
     

    
     public function category(Request $request){
          try {

            if(isset($_GET['shop'])){
                 $chk_category = DB::table('categories')->where( array(
                 'status'=>1,'shop_id'=>$_GET['shop']
                  ))->get();
              }else{
                 $chk_category = DB::table('categories')->where( array(
                 'status'=>1
                  ))->get();
              }
             
             if (!empty($chk_category)) {
                    $message = 'Category fetch successfully';
                    return $this->sendResponse($chk_category, $message);
             }else{
                return $this->sendResponse(null, 'category not available');
             }
             
            
             
             return $this->sendError($message,['error' => 'error occure']);
         } catch (\Exception $e) {
             DB::rollBack();
             $message = $e->getMessage();
             return $this->sendError(false, $message);
         }
     }

    
     public function fetch_category_by_id($id){
        try {
               
               $chk_category_id = DB::table('categories')->where( array(
                'id'=>$id,'status'=>1
            ))->first();
            if (!empty($chk_category_id)) {
                $message = 'category fetch successfully!';
                return $this->sendResponse($chk_category_id,$message);
        }else{
            $message = 'Wrong category id';
        }
             
             
             
             return $this->sendError($message,['error' => 'error occure']);
         } catch (\Exception $e) {
             DB::rollBack();
             $message = $e->getMessage();
             return $this->sendError(false, $message);
         }
     }


     public function product_category(Request $request){
        try {

           if(isset($_GET['products'])){
              $chk_category = DB::table('categories')->where( array(
               'status'=>1,'category_id'=>$_GET['products']
              ))->get();
            }else{
              $chk_category = DB::table('categories')->where( array(
               'status'=>1
              ))->get();
            }
            
           if (!empty($chk_category)) {
                  $message = 'categories fetch successfully';
                  return $this->sendResponse($chk_category, $message);
           }else{
              return $this->sendResponse(null, 'categories not available');
           }
           
          return $this->sendError($message,['error' => 'error occure']);
       } catch (\Exception $e) {
           DB::rollBack();
           $message = $e->getMessage();
           return $this->sendError(false, $message);
       }
   }


     public function fetch_product_by_category_id($id){
       
          try {
              
              $chk_category_id = Categorie::where('id',$id)->first();
              $products= $chk_category_id->products()->get();
              //return $products;
             // dd($products);
              dd($chk_category_id);
               $chk_category_id = DB::table('products')->where( array(
                'category_id'=>$id,'status'=>1
            ))->get();
            
            if (!empty($chk_category_id)) {
                $message = 'Product fetch successfully!';
                return $this->sendResponse($chk_category_id,$message);
        }else{
            $message = 'Wrong category id';
        }
             
             
             
             return $this->sendError($message,['error' => 'error occure']);
         } catch (\Exception $e) {
             DB::rollBack();
             $message = $e->getMessage();
             return $this->sendError(false, $message);
         }
     }

    
     
     public function product_list(Request $request){
        // $chk_product = Product::with('brand','vendor','category','size','shop_id');
        // $chk_product =$chk_product->where(array('status'=>1 ,'shop_id'=> $shop_id));
        // dd($chk_product);
        try {
            $shop_id = Crypt::decryptString($request->header('X-Shop-Key'));
          //  dd($shop_id);
             $chk_product = Product::with('brand','vendor','category','size');
           
             $chk_product =$chk_product->where(array('status'=>1 ,'shop_id'=> $shop_id));
               
            if($request->all()){
                if($request->category){
                    $chk_product =$chk_product->where('category_id','=',$request->category);
                   
                }

                if($request->brand != ''){
                    $brands = explode(',', $request->brand);
                    $chk_product =$chk_product->wherein('products.brand_id',$brands);
                }

                if($request->size != ''){
                     $product_size = explode(',', $request->size);
                     $chk_product =$chk_product->wherein('products.product_size',$product_size);
                }
              

                if($request->price_min != '' && $request->price_max  != ''){
                    $chk_product =$chk_product->where('sale_price','>=',$request->price_min);
                    $chk_product =$chk_product->where('sale_price','<=',$request->price_max);
                   
                }
               

                if($request->sort_by != ''){
                   if($request->sort_by == 'low'){
                        $chk_product =$chk_product->orderBy('sale_price','DESC');
                    }elseif($request->sort_by == 'high'){
                     $chk_product =$chk_product->orderBy('sale_price','ASC');
                    }elseif($request->sort_by == 'popularity'){
                      $chk_product =$chk_product->orderBy('id','DESC');
                    }
                }else{
                    $chk_product = $chk_product->orderBy('id','DESC');
                }

                if($request->search != ''){
                      $chk_product =$chk_product->where('name','like','%'.$request->search.'%');
                }


             }
                

               $chk_product = $chk_product->get();
              // dd($chk_product);
             
           if (!empty($chk_product)) {
                  $message = 'Product fetch successfully';
                  return $this->sendResponse($chk_product, $message);
           }else{
              return $this->sendResponse(null, 'Product not available');
           }
           
          
           $message = 'Not Found any Product';
           return $this->sendError($message,['error' => 'error occure']);
       } catch (\Exception $e) {
           DB::rollBack();
           $message = $e->getMessage();
           return $this->sendError(false, $message);
       }
   }


   public function shop_list(Request $request){
        try {
            $chk_product = DB::table('users')->select('id','shopname')->where( array(
               'status'=>1,'type' => 'shop'
           ))->get();
             
           if (!empty($chk_product)) {
                  $message = 'Shop List fetch successfully';
                  return $this->sendResponse($chk_product, $message);
           }else{
              return $this->sendResponse(null, 'Shop not available');
           }
           
          
           
           return $this->sendError($message,['error' => 'error occure']);
       } catch (\Exception $e) {
           DB::rollBack();
           $message = $e->getMessage();
           return $this->sendError(false, $message);
       }
   }

   public function product_by_id($id){
   
      try {
           
           $chk_category_id = Product::with('brand','vendor','category','size')->where( array(
            'id'=>$id,'status'=>1
        ))->first();

        if (!empty($chk_category_id)) {
            $message = 'Product fetch successfully!';
            return $this->sendResponse($chk_category_id,$message);
    }else{
        $message = 'product id not valid';
    }
         
         
         
         return $this->sendError($message,['error' => 'error occure']);
     } catch (\Exception $e) {
         DB::rollBack();
         $message = $e->getMessage();
         return $this->sendError(false, $message);
     }
 }

 public function address(Request $request){
    try {
           $user = $request->user();
          
           $address = Address::where(array(
            'customer_id'=>$user->id))->get();
           //dd($address);
        if (!empty($address)) {
            $message = 'Address fetch successfully!';
            return $this->sendResponse($address,$message);
    }else{
        $message = 'not have any address';
    }
         
         return $this->sendError($message,['error' => 'error occure']);
     } catch (\Exception $e) {
         DB::rollBack();
         $message = $e->getMessage();
         return $this->sendError(false, $message);
     }
 }


 public function addressDefault(Request $request){
    try {
           $user = $request->user();
          
           $address = Address::where(array(
            'customer_id'=>$user->id,'default' =>1))->orderBy('id','DESC')->first();
        if (!empty($address)) {
            $message = 'Address fetch successfully!';
            return $this->sendResponse($address,$message);
    }else{
        $message = 'not have any address';
    }
         
         return $this->sendError($message,['error' => 'error occure']);
     } catch (\Exception $e) {
         DB::rollBack();
         $message = $e->getMessage();
         return $this->sendError(false, $message);
     }
 }


 public function addressbyId($id){
    try {
           $address = Address::where(array(
            'id'=>$id))->first();
        if (!empty($address)) {
            $message = 'Address fetch successfully!';
            return $this->sendResponse($address,$message);
    }else{
        $message = 'not have any address';
    }
         
         return $this->sendError($message,['error' => 'error occure']);
     } catch (\Exception $e) {
         DB::rollBack();
         $message = $e->getMessage();
         return $this->sendError(false, $message);
     }
 }

 public function save_address(Request $request){
    $user = $request->user();
    $input = $request->all();
     $rule = array(
         'title'=>'required',
         'type'=>'required',
         'first_name'=>'required',
         'last_name'=>'required',
         'default'=>'required',
         'address'=>'required',
         'country'=>'required',
         'state'=>'required',
         'city'=>'required',
         'zip'=>'required'
         
     );
     $messages = array();
     $validation = Validator::make($input,  $rule, $messages);
      if ($validation->fails()) {
         $message = $validation->messages()->first();
        
         return $this->sendError($message,['error' => 'error occure']);
     }
      try {
           $data = array(
             'title' => $input['title'],
             'type' => $input['type'],
             'first_name'=>$input['first_name'],
             'last_name'=>$input['last_name'],
             'default' => $input['default'],
             'customer_id' => $user->id,
             'address' => json_encode(array(
                    'address' => $input['address'],
                    'country' => $input['country'],
                    'state' => $input['state'],
                    'city' => $input['city'],
                    'zip' => $input['zip']
                )),

           );
           $result = Address::create($data);
        if ($result) {
            $message = 'Address Create Successfully!';
            return $this->sendResponse($result,$message);
        }
         $message = 'Address Not Found';
         return $this->sendError($message,['error' => 'error occure']);
     } catch (\Exception $e) {
         DB::rollBack();
         $message = $e->getMessage();
         return $this->sendError(false, $message);
     }
 }

   public function update_address(Request $request,$id){
    $input = $request->all();
     $rule = array(
         'title'=>'required',
         'first_name'=>'required',
         'last_name'=>'required',
         'type'=>'required',
         'default'=>'required',
         'address'=>'required',
         'country'=>'required',
         'state'=>'required',
         'city'=>'required',
         'zip'=>'required'
         
     );
     $messages = array();
     $validation = Validator::make($input,  $rule, $messages);
      if ($validation->fails()) {
         $message = $validation->messages()->first();
        
         return $this->sendError($message,['error' => 'error occure']);
     }
      try {
           $data = array(
             'title' => $input['title'],
             'type' => $input['type'],
             'first_name'=>$input['first_name'],
             'last_name'=>$input['last_name'],
             'default' => $input['default'],
             'address' => json_encode(array(
                    'address' => $input['address'],
                    'country' => $input['country'],
                    'state' => $input['state'],
                    'city' => $input['city'],
                    'zip' => $input['zip']
                )),

           );
           $result = Address::where('id',$id)->update($data);
        if ($result) {
            $message = 'Address Update Successfully!';
            return $this->sendResponse($result,$message);
        }
         $message = 'some error occure';
         return $this->sendError($message,['error' => 'error occure']);
     } catch (\Exception $e) {
         DB::rollBack();
         $message = $e->getMessage();
         return $this->sendError(false, $message);
     }
 }

 public function order_store(Request $request){
    $user = $request->user();
    $input = $request->all();
     $rule = array(
         'customer_contact'=>'required',
         'products'=>'required',
         'status'=>'required',
         'amount'=>'required',
         'sales_tax'=>'required',
         'paid_total'=>'required',
         'total'=>'required',
         'shop_id'=>'required',
         'shipping_address'=>'required',
         'billing_address'=>'required',
         
     );
     $messages = array();
     $validation = Validator::make($input,  $rule, $messages);
      if ($validation->fails()) {
         $message = $validation->messages()->first();
         return $this->sendError($message,['error' => 'error occure']);
     }
      try {
           $data = array(
            'customer_id'=> $user->id,
            'customer_contact'=>$input['customer_contact'],
            'status'=>$input['status'],
            'amount'=>$input['amount'],
            'sales_tax'=>$input['sales_tax'],
            'paid_total'=>$input['paid_total'],
            'total'=>$input['total'],
            'shop_id'=>$input['shop_id'],
            'shipping_address'=>json_encode($input['shipping_address']),
            'billing_address'=> json_encode($input['billing_address']),
           );
           $result = Order::create($data);
        if ($result) {
            if(!empty($input['products'])){
                foreach ($input['products'] as $key => $value) {
                     $product = array(
                           'order_id'=>$result->id,
                           'product_id'=>$value['product_id'],
                           'order_quantity'=>$value['order_quantity'],
                           'unit_price'=>$value['unit_price'],
                           'subtotal'=>$value['subtotal'],
                     );
                  $prod =  Order_product::create($product);
                }

              $result->product =Order_product::where('order_id',$result->id)->get();
            }

            $message = 'Order Create Successfully!';
            return $this->sendResponse($result,$message);
        }
         $message = 'some error occure';
         return $this->sendError($message,['error' => 'error occure']);
     } catch (\Exception $e) {
         DB::rollBack();
         $message = $e->getMessage();
         return $this->sendError(false, $message);
     }
 }


 public function order_update(Request $request,$id){
    $user = $request->user();
    $input = $request->all();
     $rule = array(
         'customer_contact'=>'required',
         'products'=>'required',
         'status'=>'required',
         'amount'=>'required',
         'sales_tax'=>'required',
         'paid_total'=>'required',
         'total'=>'required',
         'shop_id'=>'required',
         'shipping_address'=>'required',
         'billing_address'=>'required',
         
     );
     $messages = array();
     $validation = Validator::make($input,  $rule, $messages);
      if ($validation->fails()) {
         $message = $validation->messages()->first();
         return $this->sendError($message,['error' => 'error occure']);
     }
      try {
           $data = array(
            'customer_id'=> $user->id,
            'customer_contact'=>$input['customer_contact'],
            'status'=>$input['status'],
            'amount'=>$input['amount'],
            'sales_tax'=>$input['sales_tax'],
            'paid_total'=>$input['paid_total'],
            'total'=>$input['total'],
            'shop_id'=>$input['shop_id'],
            'shipping_address'=>json_encode($input['shipping_address']),
            'billing_address'=> json_encode($input['billing_address']),
           );
           $result = Order::where('id',$id)->update($data);

        if ($result) {
            if(!empty($input['products'])){
                Order_product::where('order_id',$id)->delete();
                $order = Order::where('id',$id)->first();
                foreach ($input['products'] as $key => $value) {
                     $product = array(
                           'order_id'=>$id,
                           'product_id'=>$value['product_id'],
                           'order_quantity'=>$value['order_quantity'],
                           'unit_price'=>$value['unit_price'],
                           'subtotal'=>$value['subtotal'],
                     );
                  $prod =  Order_product::create($product);
                }

              $order->product =Order_product::where('order_id',$id)->get();
            }

            $message = 'Order Update Successfully!';
            return $this->sendResponse($order,$message);
        }
         $message = 'some error occure';
         return $this->sendError($message,['error' => 'error occure']);
     } catch (\Exception $e) {
         DB::rollBack();
         $message = $e->getMessage();
         return $this->sendError(false, $message);
     }
 }

 
 
 public function add_cart(Request $request){
    $user = $request->user();
         
    $input = $request->all();
     $rule = array(
        'product_id'=>'required',
        'qty'=>'required',
        'type'=>'required',
     );
     $messages = array();
     $validation = Validator::make($input,  $rule, $messages);
      if ($validation->fails()) {
         $message = $validation->messages()->first();
        
         return $this->sendError($message,['error' => 'error occure']);
     }
      try {
           $input['customer_id'] = $user->id;
           $exist =Cart::where(array('type' => $input['type'],'customer_id' => $input['customer_id'],'product_id'=>$input['product_id']))->first();
           if($exist == ''){
               $chk_category_id = Cart::create($input);
           }else{
               $chk_category_id = Cart::where(array('type' => $input['type'],'customer_id' => $input['customer_id'],'product_id'=>$input['product_id']))->update($input);
           }
        if (!empty($chk_category_id)) {
            $message = 'Add to Cart successfully!';
            return $this->sendResponse($chk_category_id,$message);
        }
         $message = 'Some error occure!';
         return $this->sendError($message,['error' => 'error occure']);
     } catch (\Exception $e) {
         DB::rollBack();
         $message = $e->getMessage();
         return $this->sendError(false, $message);
     }
 }

 public function delete_cart($id){
    try {
        $chk_category_id = Cart::where('id',$id)->delete();
        $message = 'Delete to Cart successfully!';
        return $this->sendResponse($chk_category_id,$message);
     }catch (\Exception $e) {
         DB::rollBack();
         $message = $e->getMessage();
         return $this->sendError(false, $message);
     }
 }

 
 public function cart(Request $request){
    try {
           $user = $request->user();
           $id=1;
           $chk_category_id = Cart::with('product')->where( array(
            'customer_id'=>$user->id,'type' => 'cart'))->get();
        if (!empty($chk_category_id)) {
            $message = 'Cart fetch successfully!';
            return $this->sendResponse($chk_category_id,$message);
    }else{
        $message = 'not have any data';
    }
         
         return $this->sendError($message,['error' => 'error occure']);
     } catch (\Exception $e) {
         DB::rollBack();
         $message = $e->getMessage();
         return $this->sendError(false, $message);
     }
 }

 public function wishlist(Request $request){
    try {
           $user = $request->user();
           $chk_category_id = Cart::with('product')->where( array(
            'customer_id'=>$user->id,'type' => 'wishlist'))->get();
        if (!empty($chk_category_id)) {
            $message = 'wishlist fetch successfully!';
            return $this->sendResponse($chk_category_id,$message);
    }else{
        $message = 'not have any data';
    }
         
         return $this->sendError($message,['error' => 'error occure']);
     } catch (\Exception $e) {
         DB::rollBack();
         $message = $e->getMessage();
         return $this->sendError(false, $message);
     }
 }

 public function get_order_status(){
    try {
           $chk_category_id = Order_status::get();
        if (!empty($chk_category_id)) {
            $message = 'Order Status fetch successfully!';
            return $this->sendResponse($chk_category_id,$message);
    }else{
        $message = 'not have any data';
    }
         
         return $this->sendError($message,['error' => 'error occure']);
     } catch (\Exception $e) {
         DB::rollBack();
         $message = $e->getMessage();
         return $this->sendError(false, $message);
     }
 }

 public function order_status_update(Request $request){
    $input = $request->all();
     $rule = array(
        'order_id' => 'required',
        'status'=>'required',
     );
     $messages = array();
     $validation = Validator::make($input,  $rule, $messages);
      if ($validation->fails()) {
         $message = $validation->messages()->first();
        
         return $this->sendError($message,['error' => 'error occure']);
     }
      try {
        $chk_category_id = Order::where(array('id' => $input['order_id']))->update(array('status'=> $input['status']));
       
        if (!empty($chk_category_id)) {
            $message = 'Order Status Update successfully!';
            return $this->sendResponse($chk_category_id,$message);
        }
         $message = 'Some error occure!';
         return $this->sendError($message,['error' => 'error occure']);
     } catch (\Exception $e) {
         DB::rollBack();
         $message = $e->getMessage();
         return $this->sendError(false, $message);
     }
 }
  
  public function logout(){
     try {
          
          auth()->user()->tokens()->delete();

          $message = 'Logged Out';
          return $this->sendResponse([], $message);
       
       } catch (\Exception $e) {
           DB::rollBack();
           $message = $e->getMessage();
           return $this->sendError(false, $message);
       }
  }

  public function shop_logout(Request $request){
      try {
            
        $request->header('X-Shop-Key', '');
        return $request->header('X-Shop-Key');
           
       } catch (\Exception $e) {
           DB::rollBack();
           $message = $e->getMessage();
           return $this->sendError(false, $message);
       }
  }


  public function razorpay(Request $request){
    try {
           $chk_category_id =array('razorpay_key'=>env('RAZORPAY_KEY'),'razorpay_secret'=>env('RAZORPAY_SECRET'),'currency_code'=>env('CURRENCY_CODE'));
        if (!empty($chk_category_id)) {
            $message = 'Razorpay Details fetch successfully!';
            return $this->sendResponse($chk_category_id,$message);
    }else{
        $message = 'not have any data';
    }
         
         return $this->sendError($message,['error' => 'error occure']);
     } catch (\Exception $e) {
         DB::rollBack();
         $message = $e->getMessage();
         return $this->sendError(false, $message);
     }
  }

  public function newsletter(Request $request){
    $user = $request->user();
    $input = $request->all();
     $rule = array(
         'email'=>'required',
         
     );
     $messages = array();
     $validation = Validator::make($input,  $rule, $messages);
      if ($validation->fails()) {
         $message = $validation->messages()->first();
        
         return $this->sendError($message,['error' => 'error occure']);
     }
      try {
           $data = array(
             'email' => $input['email']
           );
           $result = Newsletter::create($data);
        if ($result) {
            $message = 'Newsletter Add Successfully!';
            return $this->sendResponse($result,$message);
        }
         $message = 'Newsletter Not Add';
         return $this->sendError($message,['error' => 'error occure']);
     } catch (\Exception $e) {
         DB::rollBack();
         $message = $e->getMessage();
         return $this->sendError(false, $message);
     }
  }

  public function get_coupons(){
    try {
           $chk_category_id = Giftcard::get();
        if (!empty($chk_category_id)) {
            $message = 'Coupons fetch successfully!';
            return $this->sendResponse($chk_category_id,$message);
    }else{
        $message = 'not have any data';
    }
         
         return $this->sendError($message,['error' => 'error occure']);
     } catch (\Exception $e) {
         DB::rollBack();
         $message = $e->getMessage();
         return $this->sendError(false, $message);
     }
 }

 public function get_coupons_byid($code){
    try {
           $chk_category_id = Giftcard::where('giftcode',$code)->first();
           if($chk_category_id->start_date <= date('Y-m-d') && $chk_category_id->end_date >= date('Y-m-d') ){
               $chk_category_id->expired_status = 'valid';
           }else{
               
               $chk_category_id->expired_status = 'expired';
           }
        if (!empty($chk_category_id)) {
            $message = 'Coupon fetch successfully!';
            return $this->sendResponse($chk_category_id,$message);
    }else{
        $message = 'not have any data';
    }
         
         return $this->sendError($message,['error' => 'error occure']);
     } catch (\Exception $e) {
         DB::rollBack();
         $message = $e->getMessage();
         return $this->sendError(false, $message);
     }
 }
 
}

