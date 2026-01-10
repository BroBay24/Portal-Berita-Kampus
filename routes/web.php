<?php

use App\Http\Controllers\LandingController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\AuthorController;
use Illuminate\Support\Facades\Route;

// Public routes
Route::get('/', [LandingController::class, 'index'])->name('landing');

Route::get('/news/{slug}', [NewsController::class, 'show'])->name('news.show');

Route::get('/author/{username}', [AuthorController::class, 'show'])->name('author.show');

// Redirect /login to Filament admin login
Route::get('/login', function () {
    return redirect('/admin/login');
})->name('login');

// Category catch-all, but ignore static asset folders so Vite/build assets still load
Route::get('/{slug}', [NewsController::class, 'category'])
	->where('slug', '^(?!build|storage|assets|favicon\.ico|login|admin).*')
	->name('category.show');