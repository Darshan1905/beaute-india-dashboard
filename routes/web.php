<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\IndustrysegmentController;
use App\Http\Controllers\BusinessactivitieController;
use App\Http\Controllers\UomController;
use App\Http\Controllers\TaxController;
use App\Http\Controllers\BusinessController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserbranchController;
use App\Http\Controllers\CustomermasterController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\SubcategoryController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\MaterialvendorController;
use App\Http\Controllers\VendorbrandController;
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
    Route::resource('industrysegments', IndustrysegmentController::class);
    Route::get('industrysegmentList', [IndustrysegmentController::class, 'IndustrysegmentList'])->name('industrysegments-list');
    Route::resource('businessactivities', BusinessactivitieController::class);
    Route::get('businessactivitieList/', [BusinessactivitieController::class, 'BusinessactivitieList'])->name('businessactivities-list');
    Route::resource('uoms', UomController::class);
    Route::get('uomsList/', [UomController::class, 'uomsList'])->name('uoms-list');
    Route::resource('taxes', TaxController::class);
    Route::get('taxesList/', [TaxController::class, 'taxsList'])->name('taxes-list');
    Route::resource('businesses', BusinessController::class);
    Route::get('businessesList/', [BusinessController::class, 'businessesList'])->name('businesses-list');
    Route::resource('branches', BranchController::class);
    Route::get('branchesList/', [BranchController::class, 'branchesList'])->name('branches-list');
    Route::resource('categorys', CategoryController::class);
    Route::get('category-list/', [CategoryController::class, 'categoryList'])->name('category-list');
    Route::resource('customermaster', CustomermasterController::class);
    Route::get('customermaster-list/', [CustomermasterController::class, 'customermasterList'])->name('customermaster-list');
    Route::resource('userbranches', UserbranchController::class);
    Route::get('userbranchesList/', [UserbranchController::class, 'userbranchesList'])->name('userbranches-list');
    Route::resource('brands', BrandController::class);
    Route::get('brandsList/', [BrandController::class, 'brandsList'])->name('brands-list');
    Route::resource('vendors', VendorController::class);
    Route::get('vendorsList/', [VendorController::class, 'vendorsList'])->name('vendors-list');
    Route::resource('subcategorys', SubcategoryController::class);
    Route::get('subcategorys-list/', [SubcategoryController::class, 'subcategorysList'])->name('subcategorys-list');
    Route::resource('material', MaterialController::class);
    Route::get('material-list/', [MaterialController::class, 'materialList'])->name('material-list');
    Route::get('state-list/', [HomeController::class, 'stateList'])->name('state-list');
    Route::get('city-list/', [HomeController::class, 'cityList'])->name('city-list');
    Route::resource('materialvendor', MaterialvendorController::class);
    Route::get('materialvendorlist/', [MaterialvendorController::class, 'materialvendorList'])->name('materialvendor-list');
    Route::resource('vendorbrands', VendorbrandController::class);
    Route::get('vendorbrands-list/', [VendorbrandController::class, 'vendorbrandsList'])->name('vendorbrands-list');
});