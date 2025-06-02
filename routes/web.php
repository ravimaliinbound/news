<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('website.index');
});
Route::get('/index', function () {
    return view('website.index');
});
Route::get('/detail', function () {
    return view('website.detail');
});
Route::get('/404', function () {
    return view('website.404');
});
Route::get('/contact', function () {
    return view('website.contact');
});

