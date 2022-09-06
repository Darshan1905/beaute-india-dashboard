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

Route::post('login', [ApiController::class, 'login']);

Route::post('registration', [ApiController::class, 'registration']);

Route::post('varify_email', [ApiController::class, 'varify_email']);

Route::post('verify_otp', [ApiController::class, 'verify_otp']);

Route::post('forgot_password', [ApiController::class, 'forgot_password']);

Route::get('category', [ApiController::class, 'category']);

Route::get('sliderimages', [ApiController::class, 'sliderimages']);

Route::get('subcategory', [ApiController::class, 'subcategory']);

Route::get('product_list', [ApiController::class, 'product_list']);

Route::post('product_by_id', [ApiController::class, 'product_by_id']);

Route::post('fetch_category_by_id', [ApiController::class, 'fetch_category_by_id']);

Route::post('fetch_subcategory_by_id', [ApiController::class, 'fetch_subcategory_by_id']);

Route::post('fetch_subcategory_by_category_id', [ApiController::class, 'fetch_subcategory_by_category_id']);

Route::post('fetch_product_by_category_id', [ApiController::class, 'fetch_product_by_category_id']);

Route::post('fetch_product_by_subcategory_id', [ApiController::class, 'fetch_product_by_subcategory_id']);





