<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\shopController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubcategoryController;




/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::group(['middleware' => ['auth']], function() {
    Route::resource('users', UserController::class);
    Route::resource('roles', RoleController::class);
    Route::resource('permissions', PermissionController::class);
    
    Route::resource('shop', shopController::class);
    Route::get('shopList/', [shopController::class, 'shopList'])->name('shop-list');
    
    Route::resource('categorys', CategoryController::class);
    Route::get('category-list/', [CategoryController::class, 'categoryList'])->name('category-list');
   
    Route::resource('subcategorys', SubcategoryController::class);
    Route::get('subcategorys-list/', [SubcategoryController::class, 'subcategorysList'])->name('subcategorys-list');
    Route::get('state-list/', [HomeController::class, 'stateList'])->name('state-list');
    Route::get('city-list/', [HomeController::class, 'cityList'])->name('city-list');
   

    Route::resource('vendors', VendorController::class);
    Route::get('vendorsList/', [VendorController::class, 'vendorsList'])->name('vendors-list');
  
});