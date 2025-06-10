<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('website.index');
});
Route::get('/index', function () {
    return view('website.index');
});
Route::get('/technology', function () {
    return view('website.technology');
});
Route::get('/business', function () {
    return view('website.business');
});
Route::get('/entertainment', function () {
    return view('website.entertainment');
});
Route::get('/science', function () {
    return view('website.science');
});
Route::get('/travel', function () {
    return view('website.travel');
});

Route::get('/profile',[UserController::class,'profile']);
Route::get('/user-logout',[UserController::class,'user_logout']);

Route::get('/login',[UserController::class,'create']);
Route::post('/login',[UserController::class,'user_auth']);

Route::get('/signup',[UserController::class,'signup']);
Route::post('/signup',[UserController::class,'store']);

/*
 * 404 view, for unknown route which is not defined
 */

Route::fallback(function () {
    return redirect('404');
});
Route::get('/404', function () {
    return view('website.404');
});  