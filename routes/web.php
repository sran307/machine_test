<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin_controller;
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
//root for home default page
Route::get('/', [admin_controller::class,"admin_page"]);
Route::get("/",[admin_controller::class,"home_page"]);
//setting root for adding user 
Route::post("/admin",[admin_controller::class,"admin"]);
//root for registration page
Route::get("/admin_panel",[admin_controller::class,"admin_panel"]);
//root for inventory page
Route::get("inventory",function(){
    return view("inventory");
});
//root for adding product form
Route::get("/add_product",function(){
    return view("add_product");
});
//root for adding product
Route::post("/add_product_form",[admin_controller::class,"add_product_form"]);
//root for edit form
Route::get("/edit_product",[admin_controller::class,"edit_product"]);
//root for fetching data for the corresponding product id
Route::post("/fetch_edit_product",[admin_controller::class,"fetch_edit_product"]);
//root for update the table
Route::post("/edit_product_data",[admin_controller::class,"edit_product_data"]);
//root for delete
Route::get("/delete_product",[admin_controller::class,"delete_product"]);
Route::delete("/delete_data/{id}",[admin_controller::class,"delete_data"]);
//product listing root
Route::get("/product_list",[admin_controller::class,"product_list"]);
//root for adding user
Route::get("/add_user",function(){
    return view("add_user");
});
Route::post("/add_user_data",[admin_controller::class,"add_user_data"]);
//user login page root
Route::get("/user_login",function(){
    return view("user_login");
});
Route::post("/user_login_form",[admin_controller::class,"user_login_form"]);
//expense
Route::get("/expense",function(){
    return view("expense");
});
Route::post("/expense_form",[admin_controller::class,"expense_form"]);