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

Route::get('/', function () {
    return view('index');
});

Auth::routes();
    // Route::any('/logo/store', 'LogoController@store');    

Route::resource('logo', 'LogoController');
Route::resource('header', 'HeaderController');
Route::resource('banner', 'BannerController');
Route::resource('about', 'AboutController');
Route::resource('services', 'ServicesController');
Route::resource('application', 'ApplicationController');
Route::resource('testimonial', 'TestimonialController');
Route::resource('product', 'ProductController');
Route::resource('footer', 'FooterController');
Route::resource('blog', 'BlogController');
Route::resource('clientlogo', 'ClientlogoController');

Route::resource('contact', 'ContactController');
Route::resource('enquiry', 'EnquiryController');
