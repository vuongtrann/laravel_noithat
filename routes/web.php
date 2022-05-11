<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

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

Route::get('/',[ProductController::class,'index']);
//Route::get('/',[ProductController::class,'menu']);
Route::get('san-pham/{id}',[ProductController::class,'showSingleProduct'])->name('product');
Route::get('tat-ca-san-pham',[ProductController::class,'showAllProduct'])->name('all');

Route::get('danh-sach-san-pham-thuoc-loai/{id}',[ProductController::class, 'showListProductInCategory'])->name('listProductInCate');// show danh sách của loại sản phẩm
Route::get('danh-sach-san-pham-thuoc-loai./{id}',[ProductController::class, 'showListProduct'])->name('listProduct'); //show danh sách của chi tiết loại sản phẩm
Route::get('ket-qua-tim-kiem',[ProductController::class,'searchResult'])->name('search');


