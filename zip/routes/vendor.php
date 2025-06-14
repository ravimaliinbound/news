<?php

use Illuminate\Support\Facades\Route;

// Authentication admin Login Routes
Route::get('login', 'Auth\LoginController@showLoginForm')->name('vendor.login');
Route::post('login', 'Auth\LoginController@login')->name('vendor.postlogin');
Route::get('logout/{id?}', 'Auth\LoginController@logout')->name('vendor.logout');

//forget and reset password
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('vendor.auth.password.reset');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('vendor.passwordemail');
Route::get('password/reset/{token?}', 'Auth\ResetPasswordController@showResetForm')->name('vendor.auth.password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('vendor.resetpassword');

// //register
// Route::get('register', 'VendorController@register')->name('vendor.register');
// Route::post('post-register', 'VendorController@postRegister')->name('vendor.postRegister');


Route::get('/', 'VendorController@index')->name('vendor.dashboard');
// Route::get('inventory', 'InventoryController@index')->name('vendor.inventory');
