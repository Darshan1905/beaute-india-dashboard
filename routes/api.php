<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ApiController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('shop_login', [ApiController::class, 'shop_login']);
Route::post('login', [ApiController::class, 'login']);

Route::post('registration', [ApiController::class, 'registration']);

Route::post('varify_email', [ApiController::class, 'varify_email']);

Route::post('verify_otp', [ApiController::class, 'verify_otp']);

Route::post('forgot_password', [ApiController::class, 'forgot_password']);

Route::get('category', [ApiController::class, 'category']);

Route::get('sliderimages', [ApiController::class, 'sliderimages']);

Route::get('subcategory', [ApiController::class, 'subcategory']);


Route::get('shop_list', [ApiController::class, 'shop_list']);

Route::get('product_list', [ApiController::class, 'product_list']);
Route::get('product_by_id/{id}', [ApiController::class, 'product_by_id']);

Route::get('fetch_category_by_id/{id}', [ApiController::class, 'fetch_category_by_id']);

Route::get('fetch_product_by_category_id/{id}', [ApiController::class, 'fetch_product_by_category_id']);



Route::post('order_status_update', [ApiController::class, 'order_status_update']);

Route::get('get_order_status', [ApiController::class, 'get_order_status']);


Route::group(['middleware'=>['auth:sanctum']], function(){

      Route::get('logout', [ApiController::class, 'logout']);
      Route::get('cart', [ApiController::class, 'cart']);
      Route::get('wishlist', [ApiController::class, 'wishlist']);
      Route::post('add_cart', [ApiController::class, 'add_cart']);
      Route::get('delete_cart/{id}', [ApiController::class, 'delete_cart']);
      Route::post('save_address', [ApiController::class, 'save_address']);
      Route::post('update_address', [ApiController::class, 'update_address']);
      Route::post('order_store', [ApiController::class, 'order_store']);
      Route::post('order_product', [ApiController::class, 'order_product']);
      Route::post('order_update', [ApiController::class, 'order_update']);
       
});
