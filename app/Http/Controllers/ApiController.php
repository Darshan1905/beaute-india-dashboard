<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Session;
use Stripe;
use DB;
use Validator;
use Mail;
//use Request;
use Auth;
use Illuminate\Http\Request;
use App\Models\User;



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

    public function sendError($error, $errorMessages = [], $code = 200)
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
                'email'=>$input['email']
            ))->first();

            if ($chk_login) {
                if (Hash::check($input['password'],$chk_login->password)){
                    $message = 'Login Successfull';
                    return $this->sendResponse($chk_login, $message);
                }
               
            }
            $message = 'Please check your email or password';
            return $this->sendError($message,['error' => 'error occure']);
        } catch (\Exception $e) {
            DB::rollBack();
            $message = $e->getMessage();
            return $this->sendError(false, $message);
        }
    }

    
    public function registration(Request $request){
        $input = $request->all(); 
        $email = $input['email'];
        $input['password'] = Hash::make($input['password']);
        $rule = array(
            'name'=>'required',
            'email'=>'required',
            'password'=>'required'
        );
        $messages = array();
        $validation = Validator::make($input,  $rule,  $messages);
        if ($validation->fails()) {
            $message = $validation->messages()->first();
           
            return $this->sendError($message,['error' => 'error occure']);
        }
        try {
             $chk_officer_id = DB::table('users')->where('email',$email)->first();
            if (!empty($chk_officer_id)) {
               $result= true; 
                $message = 'Email id already exist!';
                return $this->sendResponse($result, $message);
            }else{
                 $result = DB::table('users')->insert($input);
            }
           
            if ($result) {
                $message = 'Register successfully';
                return $this->sendResponse($result, $message);
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
              $chk_category = DB::table('sliders')->where( array(
                 'status'=>1
             ))->get();
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

     public function category(Request $request){
          try {
              $chk_category = DB::table('categories')->where( array(
                 'status'=>1
             ))->get();
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

    
     public function fetch_category_by_id(Request $request){
        $input = $request->all();
         $rule = array(
            'id'=>'required',
         );
         $messages = array();
         $validation = Validator::make($input,  $rule, $messages);
          if ($validation->fails()) {
             $message = $validation->messages()->first();
            
             return $this->sendError($message,['error' => 'error occure']);
         }
          try {
               
               $chk_category_id = DB::table('categories')->where( array(
                'id'=>$input['id'],'status'=>1
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


    

     public function fetch_product_by_category_id(Request $request){
        $input = $request->all();
         $rule = array(
            'id'=>'required',
         );
         $messages = array();
         $validation = Validator::make($input,  $rule, $messages);
          if ($validation->fails()) {
             $message = $validation->messages()->first();
            
             return $this->sendError($message,['error' => 'error occure']);
         }
          try {
               
               $chk_category_id = DB::table('products')->where( array(
                'category_id'=>$input['id'],'status'=>1
            ))->first();
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
        try {
            $chk_product = DB::table('products')->where( array(
               'status'=>1
           ))->get();
           if (!empty($chk_product)) {
                  $message = 'Product fetch successfully';
                  return $this->sendResponse($chk_product, $message);
           }else{
              return $this->sendResponse(null, 'Product not available');
           }
           
          
           
           return $this->sendError($message,['error' => 'error occure']);
       } catch (\Exception $e) {
           DB::rollBack();
           $message = $e->getMessage();
           return $this->sendError(false, $message);
       }
   }

   public function product_by_id(Request $request){
    $input = $request->all();
     $rule = array(
        'id'=>'required',
     );
     $messages = array();
     $validation = Validator::make($input,  $rule, $messages);
      if ($validation->fails()) {
         $message = $validation->messages()->first();
        
         return $this->sendError($message,['error' => 'error occure']);
     }
      try {
           
           $chk_category_id = DB::table('products')->where( array(
            'id'=>$input['id'],'status'=>1
        ))->first();
        if (!empty($chk_category_id)) {
            $message = 'Product fetch successfully!';
            return $this->sendResponse($chk_category_id,$message);
    }else{
        $message = 'Wrong product id';
    }
         
         
         
         return $this->sendError($message,['error' => 'error occure']);
     } catch (\Exception $e) {
         DB::rollBack();
         $message = $e->getMessage();
         return $this->sendError(false, $message);
     }
 }
  

}

