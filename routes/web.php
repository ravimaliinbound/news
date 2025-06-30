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

// Route::fallback(function () {
//     return redirect('404');
// });
// Route::get('/404', function () {
//     return view('website.404');
// });

/*
 * Frontend
 */

Route::get('/', [NewsController::class, 'create'])->name('index');
Route::get('/index', [NewsController::class, 'create'])->name('index');
Route::get('/show_news/{id}', [NewsController::class, 'show_news'])->name('show_news');
Route::get('/technology', [TechnologyController::class, 'create'])->name('technology');
Route::get('/business', [BusinessController::class, 'create'])->name('business');
Route::get('/entertainment', [EntertainmentController::class, 'create'])->name('entertainment');
Route::get('/science', [ScienceController::class, 'create'])->name('science');
Route::get('/travel', [TravelController::class, 'create'])->name('travel');

/*
 * Login, logout, signup, upadte profile
 */

Route::get('/signup', [UserController::class, 'signup'])->name('signup');
Route::post('/signup', [UserController::class, 'store'])->name('store_user');
Route::get('/login', [UserController::class, 'create'])->name('login');
Route::post('/login', [UserController::class, 'user_auth'])->name('user_auth');
Route::get('/user-profile', [UserController::class, 'profile'])->name('user-profile')->middleware(UserMiddleware::class);
Route::get('/update-profile/{id}', [UserController::class, 'edit'])->name('edit_user_profile')->middleware(UserMiddleware::class);
Route::post('/update-profile/{id}', [UserController::class, 'update'])->name('update_user_profile')->middleware(UserMiddleware::class);
Route::get('/user-logout', [UserController::class, 'user_logout'])->name('user-logout')->middleware(UserMiddleware::class);

/*
 * Admin authentication
 */

Route::get('/admin-login', [AdminController::class, 'login'])->name('admin-login');
Route::post('/admin-login', [AdminController::class, 'admin_auth'])->name('admin_auth');
Route::get('/admin-logout', [AdminController::class, 'admin_logout'])->name('admin_logout')->middleware(AdminMiddleware::class);
Route::get('/manage-profile', [AdminController::class, 'manage_profile'])->name('manage_profile')->middleware(AdminMiddleware::class);
Route::post('/manage-profile', [AdminController::class, 'update'])->name('update_profile')->middleware(AdminMiddleware::class);

/*
 * Dashboard
 */

Route::middleware(AdminMiddleware::class)->group(function () {
    Route::resource('news', NewsPostController::class)->names([
        'index' => 'news.index',
        'create' => 'news.create',
        'store' => 'news.store',
        'edit' => 'news.edit',
        'update' => 'news.update',
        'destroy' => 'news.destroy',
    ]);
});


Route::get('/dashboard', [AdminController::class, 'create'])->name('dashboard')->middleware(AdminMiddleware::class);

// Route::get('news', [NewsPostController::class, 'index'])->name('manage-news')->middleware(AdminMiddleware::class);
// Route::get('news/create', [NewsPostController::class, 'create'])->name('insert-news')->middleware(AdminMiddleware::class);
// Route::post('news/create', [NewsPostController::class, 'store'])->middleware(AdminMiddleware::class);
// Route::get('news/{id}/edit', [NewsPostController::class, 'edit'])->name('news_edit')->middleware(AdminMiddleware::class);
// Route::post('news/{id}/edit', [NewsPostController::class, 'update'])->name('news_update')->middleware(AdminMiddleware::class);
// Route::get('news/{id}/delete', [NewsPostController::class, 'destroy'])->name('news_delete')->middleware(AdminMiddleware::class);
// Route::get('news/{id}/destroy', [NewsPostController::class, 'destroy'])->name('news.destroy')->middleware(AdminMiddleware::class);

Route::post('/upload', [NewsPostController::class, 'uploadImage'])->name('news.upload')->middleware(AdminMiddleware::class);

Route::get('/show_users', [UserController::class, 'show_users'])->name('show_users')->middleware(AdminMiddleware::class);
Route::get('/manage_users', [UserController::class, 'manage_users'])->name('manage_users')->middleware(AdminMiddleware::class);

Route::get('/approve_request/{id}', [UserController::class, 'approve_request'])->name('approve_request')->middleware(AdminMiddleware::class);
Route::get('/cancel_requset/{id}', [UserController::class, 'cancel_requset'])->name('cancel_requset')->middleware(AdminMiddleware::class);
Route::get('/block_unblock_user/{id}', [UserController::class, 'block_unblock_user'])->name('block_unblock_user')->middleware(AdminMiddleware::class);
