<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\NewsPostController;
use App\Http\Controllers\BusinessController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\TechnologyController;
use App\Http\Controllers\EntertainmentController;
use App\Http\Controllers\ScienceController;
use App\Http\Controllers\TravelController;

/*
 * 404 view, for unknown route which is not defined
 */

Route::fallback(function () {
    return redirect('404');
});
Route::get('/404', function () {
    return view('website.404');
});  


/*
 * Pages
 */

Route::get('/',[NewsController::class,'create']);
Route::get('/index',[NewsController::class,'create']);
Route::get('/show_news/{id}',[NewsController::class,'show_news']);

Route::get('/technology',[TechnologyController::class,'create']);

Route::get('/business',[BusinessController::class,'create']);

Route::get('/entertainment',[EntertainmentController::class,'create']);

Route::get('/science',[ScienceController::class,'create']);

Route::get('/travel',[TravelController::class,'create']);

/*
 * Login, logout, signup
 */

Route::get('/user-logout',[UserController::class,'user_logout']);

Route::get('/login',[UserController::class,'create']);
Route::post('/login',[UserController::class,'user_auth']);

Route::get('/signup',[UserController::class,'signup']);
Route::post('/signup',[UserController::class,'store']);

/*
 * For admin panel
 */

Route::get('/dashboard',[AdminController::class,'create']);
Route::get('/admin-login',[AdminController::class,'login']);
Route::post('/admin-login',[AdminController::class,'admin_auth']);

Route::get('/insert-news',[NewsPostController::class,'create']);
Route::post('/insert-news',[NewsPostController::class,'store']);
Route::post('/upload',[NewsPostController::class,'uploadImage'])->name('upload');

Route::get('/manage-news',[NewsPostController::class,'manage_news']);