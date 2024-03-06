<?php

use App\Http\Controllers\Auth\RegisterController;

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CkeditorController;
use App\Http\Controllers\Admin\Crud_oneController;
use App\Http\Controllers\Admin\LeadController;
use App\Http\Controllers\Admin\TourController;
use App\Http\Controllers\Admin\Client_commentController;
use App\Http\Controllers\Admin\Crud_twoController;
use App\Http\Controllers\Admin\TagController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\TagsController;

// Login and Logout routes
Route::post('/login', [LoginController::class, 'authenticate'])->name('login');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

// Admin routes
Route::middleware(['auth'])->group(function () {
    Route::prefix('admin')->group(function () {

        Route::get('/', function () {
            return redirect('admin/tours');
        });

        Route::resource('/tours', TourController::class);
        Route::post('/tours/{tour}/image/{imageKey}', [TourController::class, 'updateImage']);
        Route::post('/tours/{tour}/image/{imageKey}/delete', [TourController::class, 'deleteImage']);
        Route::resource('/leads', LeadController::class);
        Route::resource('/tags', TagController::class);
        Route::resource('/categories', CategoryController::class);
        Route::resource('/client_comments', Client_commentController::class);
        Route::resource('/' . config('app.crud_one_admin'), Crud_oneController::class);
        Route::resource('/' . config('app.crud_two_admin'), Crud_twoController::class);
        Route::post('cseditor/upload', [CkeditorController::class, 'upload'])->name('ckeditor.upload');
    });
});
