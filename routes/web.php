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
//setting root for adding user 
Route::post("/admin",[admin_controller::class,"admin"]);
//root for registration page
Route::get("admin_panel",[admin_controller::class,"admin_panel"]);