<?php

use Illuminate\Support\Facades\Route;

// use Illuminate\Http\Request;
// Route::get('/abc', function (Request $request) {
//         return view('website.index');
// });

Route::get('/', function () {
    return view('website.index');
});
Route::get('/index', function () {
    return view('website.index');
});
Route::get('/detail', function () {
    return view('website.detail');
});
Route::get('/contact', function () {
    return view('website.contact');
});

// page not found route for unknown route which is not defined
Route::fallback(function () {
    return redirect('404');
});
Route::get('/404', function () {
    return view('website.404');
});