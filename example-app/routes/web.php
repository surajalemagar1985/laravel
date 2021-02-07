<?php

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

Route::get('/admin/welcome', function () {
    return view('welcome');
});
Route::get('/','App\Http\Controllers\UserController@index')->name('index');
Route::get('/contact','App\Http\Controllers\UserController@contact')->name('contact');
Route::get('/services','App\Http\Controllers\UserController@services')->name('services');
Route::get('/about','App\Http\Controllers\UserController@about')->name('about');
Route::get('/testimonial','App\Http\Controllers\UserController@testimonial')->name('testimonial');
Route::get('/productbycategory/{id}','App\Http\Controllers\UserController@productbycategory')->name('productbycategory');
Route::get('/singleproduct/{id}','App\Http\Controllers\UserController@singleproduct')->name('singleproduct');
Route::post('/searchproduct','App\Http\Controllers\UserController@searchproduct')->name('searchproduct');
Route::post('/admin/userstore','App\Http\Controllers\UserController@storeuserdetails')->name('userstore');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


Route::get('/admin/home','App\Http\Controllers\AdminController@index')->name('admin.home');
Route::get('/admin/addcategory','App\Http\Controllers\AdminController@addcategory')->name('admin.addcategory');
Route::post('/admin/savecategory','App\Http\Controllers\AdminController@storecategory')->name('admin.savecategory');
Route::post('/admin/storeproduct','App\Http\Controllers\AdminController@storeProduct')->name('admin.storeproduct');
Route::get('/admin/addproduct','App\Http\Controllers\AdminController@addProduct')->name('admin.addproduct');
Route::get('/admin/showproduct','App\Http\Controllers\AdminController@showproduct')->name('admin.showproduct');
Route::get('/admin/showcategory','App\Http\Controllers\AdminController@showcategory')->name('admin.showcategory');
Route::get('/admin/editproduct/{id}','App\Http\Controllers\AdminController@editproduct')->name('admin.editproduct');
Route::post('/admin/updateproduct/{id}','App\Http\Controllers\AdminController@updateproduct')->name('admin.updateproduct');
Route::get('/admin/deleteproduct/{id}','App\Http\Controllers\AdminController@deleteproduct')->name('admin.deleteproduct');


//user login check route//

Route::post('/userlogincheck','App\Http\Controllers\UserLoginController@userlogin')->name('userlogincheck');
Route::get('userlogout','App\Http\Controllers\UserLoginController@userlogout')->name('userlogout');
Route::get('userprofile/{id}','App\Http\Controllers\UserLoginController@userprofile')->name('userprofile');
Route::post('userprofileupdate','App\Http\Controllers\UserLoginController@userprofileupdate')->name('userprofileupdate');
Route::get('profileedit/{id}','App\Http\Controllers\UserLoginController@editprofile')->name('editprofile');
Route::post('profileupdate/{id}','App\Http\Controllers\UserLoginController@updateprofile')->name('updateprofile');
