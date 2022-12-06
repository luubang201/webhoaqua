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


Route::get('/', 'AdminController@login')->name('admin.login');
Route::post('/admin/login', 'AdminController@postLogin')->name('admin.postLogin');
Route::get('/admin/logout', 'AdminController@logout')->name('admin.logout');
Route::get('/home', 'HomeController@index')->name('Frontend.shop');
Route::get('/tin-tuc', 'HomeController@blog')->name('Frontend.blog');
Route::get('/tin-tuc-chi-tiet', 'HomeController@blog_single')->name('Frontend.blog_single');
Route::get('/gioi-thieu', 'HomeController@about')->name('Frontend.about');
Route::get('/san-pham', 'HomeController@product')->name('Frontend.product');
Route::get('/chi-tiet-san-pham', 'HomeController@product_single')->name('Frontend.product_single');
Route::get('/wishlist', 'HomeController@wishlist')->name('Frontend.wishlist');
Route::get('/gio-hang', 'HomeController@cart')->name('Frontend.cart');
Route::get('/thanh-toan', 'HomeController@checkout')->name('Frontend.checkout');
Route::get('/lien-he', 'HomeController@contact')->name('Frontend.contact');


/*Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'checkLogin'],function (){*/
Route::group(['prefix' => 'admin', 'as' => 'admin.'],function (){
Route::resource('category', 'CategoryController');
Route::resource('vendor', 'VendorController');
Route::resource('user', 'UserController');
Route::resource('product', 'ProductController');
Route::resource('article', 'ArticleController');
Route::resource('banner', 'BannerController');
});
