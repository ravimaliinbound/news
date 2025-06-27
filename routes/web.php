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

use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\UserMiddleware;
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

Route::get('/', [NewsController::class, 'create']);
Route::get('/index', [NewsController::class, 'create']);
Route::get('/show_news/{id}', [NewsController::class, 'show_news'])->name('show_news');

Route::get('/technology', [TechnologyController::class, 'create']);

Route::get('/business', [BusinessController::class, 'create']);

Route::get('/entertainment', [EntertainmentController::class, 'create']);

Route::get('/science', [ScienceController::class, 'create']);

Route::get('/travel', [TravelController::class, 'create']);


/*
 * Login, logout, signup, upadte profile
 */

Route::get('/signup', [UserController::class, 'signup']);
Route::post('/signup', [UserController::class, 'store']);

Route::get('/login', [UserController::class, 'create']);
Route::post('/login', [UserController::class, 'user_auth']);

Route::get('/user-profile', [UserController::class, 'profile'])->middleware(UserMiddleware::class);
Route::get('/update-profile/{id}', [UserController::class, 'edit'])->name('update_user_profile')->middleware(UserMiddleware::class);

Route::get('/user-logout', [UserController::class, 'user_logout'])->middleware(UserMiddleware::class);

/*
 * Admin authentication
 */

Route::get('/admin-login', [AdminController::class, 'login']);
Route::get('/admin-logout', [AdminController::class, 'admin_logout'])->name('admin_logout')->middleware(AdminMiddleware::class);
Route::get('/manage-profile', [AdminController::class, 'manage_profile'])->name('manage_profile')->middleware(AdminMiddleware::class);
Route::post('/manage-profile', [AdminController::class, 'update'])->name('update_profile')->middleware(AdminMiddleware::class);
Route::post('/admin-login', [AdminController::class, 'admin_auth']);

/*
 * Admin panel
 */
Route::get('/dashboard', [AdminController::class, 'create'])->middleware(AdminMiddleware::class);

Route::get('/insert-news', [NewsPostController::class, 'create'])->middleware(AdminMiddleware::class);
Route::post('/insert-news', [NewsPostController::class, 'store'])->middleware(AdminMiddleware::class);
Route::post('/upload', [NewsPostController::class, 'uploadImage'])->name('upload')->middleware(AdminMiddleware::class);

Route::get('/manage-news', [NewsPostController::class, 'manage_news'])->middleware(AdminMiddleware::class);
Route::get('/news-delete/{id}', [NewsPostController::class, 'destroy'])->name('news_delete')->middleware(AdminMiddleware::class);
