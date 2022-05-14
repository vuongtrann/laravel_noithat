<?php

use App\Http\Controllers\AdminController;
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
Route::get('lien-he',[ProductController::class,'lienhe'])->name('lienhe');


Route::get('/admin/login',[AdminController::class,'authLogin'])->name('login');
Route::post('/admin/confirm',[AdminController::class,'confirmAuthLogin'])->name('confirmLogin');
Route::get('/admin/logout',[AdminController::class,'logout'])->name('logout');

/** Xử lý sản phẩm */
Route::get('/admin/Dashboard',[AdminController::class,'index'])->name('index_admin');
Route::get('/admin/Dashboard/Product/Edit/{id}',[AdminController::class,'show_Form_Edit_Product'])->name('show_form_edit_product');
Route::post('/admin/Dashboard/Product/Update',[AdminController::class,'update_Product'])->name('updateProduct');
Route::get('/admin/Dashboard/Product/Delete/{id}',[AdminController::class,'delete_Product'])->name('delete_product');
Route::get('/admin/Dashboard/Product/Add',[AdminController::class,'show_form_add_product'])->name('form_add_product');
Route::post('/admin/Dashboard/Product/Save',[AdminController::class,'save_product'])->name('save_product');



Route::get('/admin/Dashboard/User',[AdminController::class,'show_Dashboard_User'])->name('user');
Route::get('/admin/Dashboard/User/Edit/{id}',[AdminController::class,'show_form_edit_user_admin'])->name('form_edit_user_admin');
Route::post('/admin/Dashboard/User/Update',[AdminController::class,'update_user_admin'])->name('update_user_admin');
Route::get('/admin/Dashboard/User/Add',[AdminController::class,'show_form_add_user_admin'])->name('form_add_user_admin');
Route::post('/admin/Dashboard/User/Save',[AdminController::class,'save_user_admin'])->name('save_user_admin');
/** Xử lý chi tiết loại sản phẩm */
Route::get('/admin/Dashboard/MoreCategory',[AdminController::class,'show_Dashboard_More_Category'])->name('more_Category');
//Xử lý sửa
Route::get('/admin/Dashboard/MoreCategory/Edit/{id}',[AdminController::class,'show_form_edit_more_category'])->name('form_edit_more_category');
Route::post('/admin/Dashboard/MoreCategory/Update',[AdminController::class,'update_more_category'])->name('update_moreCategory');
//Xử lý xoá
Route::get('/admin/Dashboard/MoreCategory/Delete/{id}',[AdminController::class,'delete_more_category'])->name('delete_more_category');
//Xử lý thêm mới
Route::get('/admin/Dashboard/MoreCategory/Add',[AdminController::class,'show_form_add_more_category'])->name('form_add_more_category');
Route::post('/admin/Dashboard/MoreCategory/Save',[AdminController::class,'save_more_category'])->name('save_more_category');


/** Xử lý loại sản phẩm */
Route::get('/admin/Dashboard/Category',[AdminController::class,'show_Dashboard_Category'])->name('Category');
//Xử lý sửa
Route::get('/admin/Dashboard/Category/Edit/{id}',[AdminController::class,'show_form_edit_category'])->name('form_edit_category');
Route::post('/admin/Dashboard/Category/Update',[AdminController::class,'update_category'])->name('update_Category');
//Xử lý xoá
Route::get('/admin/Dashboard/Category/Delete/{id}',[AdminController::class,'delete_category'])->name('delete_category');
//Xử lý thêm mới
Route::get('/admin/Dashboard/Category/Add',[AdminController::class,'show_form_add_category'])->name('form_add_category');
Route::post('/admin/Dashboard/Category/Save',[AdminController::class,'save_category'])->name('save_category');
