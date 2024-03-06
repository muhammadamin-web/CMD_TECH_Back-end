<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Crud_oneController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\LeadController;
use App\Http\Controllers\TourController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\StaticPagesController;
use App\Http\Controllers\TagController;

// Tillar ro'yxatini regex sifatida olish

// Asosiy yo'nalishlar
Route::get('/', function () {
    return redirect('/ru');
});

Route::middleware(['locale'])->group(function () {
    $locales = implode('|', config('app.available_locales'));

    Route::get('/{locale}', [HomeController::class, 'index'])
        ->name('home')
        ->where('locale', $locales);

    Route::get('/{locale}/services/{id}', [HomeController::class, 'show'])
        ->name('show')
        ->where(['locale' => $locales, 'id' => '[0-9]+']);

    Route::get('/uz/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('/uz/register', [RegisterController::class, 'register']);

    // Statik sahifalar uchun yo'nalishlar
    // Route::get('/{locale}/about', [StaticPagesController::class, 'about'])
    //     ->name('about')
    //     ->where('locale', $locales);

    // Route::get('/{locale}/lyustra_v_tashkente', [StaticPagesController::class, 'lyustra_v_tashkente'])
    //     ->name('lyustra_v_tashkente')
    //     ->where('locale', $locales);

    // Dinamik sahifalar uchun yo'nalishlar
    // Route::get('/{locale}/project/', [ProjectController::class, 'index'])
    //     ->name('project')
    //     ->where('locale', $locales);

    // Route::get('/{locale}/project/{slug}', [ProjectController::class, 'show'])
    //     ->name('project.show')
    //     ->where('locale', $locales);

    Route::get('/{locale}/services/', [TourController::class, 'index'])
        ->name('services')
        ->where('locale', $locales);

        Route::get('/{locale}/services/', [TourController::class, 'index'])
        ->name('tour')
        ->where('locale', $locales);

    Route::get('/{locale}/service/{slug}', [TourController::class, 'show'])
        ->name('service.show')
        ->where('locale', $locales);


    Route::get('/{locale}/posts/filter/', [TagController::class, 'filterByTags'])->name('posts.filter')
        ->where('locale', $locales);


    Route::get('/{locale}/' . config('app.crud_one'), [Crud_oneController::class, 'index'])
        ->name(config('app.crud_one'))
        ->where('locale', $locales);

    Route::get('/{locale}/' . config('app.crud_one') . '/{slug}', [Crud_oneController::class, 'show'])
        ->name(config('app.crud_one') . '.show')
        ->where('locale', $locales);


    Route::get('/{locale}/category/', [CategoryController::class, 'index'])
        ->name('category')
        ->where('locale', $locales);

    Route::get('/{locale}/category/{slug}', [CategoryController::class, 'show'])
        ->name('category.show')
        ->where('locale', $locales);

        
    Route::post('/{locale}/leads', [LeadController::class, 'store'])
        ->name('home.lead')
        ->where('locale', $locales);
});

Route::get('/switch/{locale}', [LanguageController::class, 'switchLanguage'])
    ->name('locale.switch');

// Yo'nalishlar uchun boshqa kodlar va qo'shimchalar...
