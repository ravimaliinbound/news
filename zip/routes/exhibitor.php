<?php

// Authentication admin Login Routes
Route::get('login', 'Auth\LoginController@showLoginForm')->name('exhibitor.login');
Route::post('login', 'Auth\LoginController@login')->name('exhibitor.postlogin');
Route::get('logout/{id?}', 'Auth\LoginController@logout')->name('exhibitor.logout');

//forget and reset password
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('exhibitor.auth.password.reset');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('exhibitor.passwordemail');
Route::get('password/reset/{token?}', 'Auth\ResetPasswordController@showResetForm')->name('exhibitor.auth.password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('exhibitor.resetpassword');

// //register
// Route::get('register', 'ExhibitorController@register')->name('exhibitor.register');
// Route::post('post-register', 'ExhibitorController@postRegister')->name('exhibitor.postRegister');


//Dashboard Route....
Route::get('/', 'ExhibitorController@dashboard')->name('exhibitor.dashboard');

