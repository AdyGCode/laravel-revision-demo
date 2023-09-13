<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StaticPageController;
use App\Http\Controllers\StatusController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [StaticPageController::class, 'home'])
    ->name('static.home');
Route::get('/privacy', [StaticPageController::class, 'privacy'])
    ->name('static.privacy');
Route::get('/contact', [StaticPageController::class, 'contact'])
    ->name('static.contact');

Route::get('/welcome', [StaticPageController::class, 'welcome'])
    ->name('static.welcome');


// Statuses Routes
//Route::get('/statuses', [StatusController::class, 'index'])->name('statuses.index');
//Route::get('/statuses/create', [StatusController::class, 'create'])->name('statuses.create');
//Route::get('/statuses/{status}/edit', [StatusController::class, 'edit'])->name('statuses.edit');
//Route::get('/statuses/{status}/delete', [StatusController::class, 'delete'])->name('statuses.delete');
//Route::get('/statuses/{status}', [StatusController::class, 'show'])->name('statuses.show');
//
//Route::post('/statuses', [StatusController::class, 'store'])->name('statuses.store');
//Route::delete('/statuses/{status}', [StatusController::class, 'destroy'])->name('statuses.destroy');
//Route::patch('/statuses/{status}', [StatusController::class, 'update'])->name('statuses.update');
//
// is replaced with:
// Route::resource('statuses', StatusController::class);
// Route::get('/statuses/{status}/delete', [StatusController::class, 'delete'])->name('statuses.delete');

Route::resource('statuses', StatusController::class)->only(['index', 'show']);
Route::middleware('auth')->group(function () {
    Route::resource('statuses', StatusController::class)->except(['index', 'show']);
    Route::get('/statuses/{status}/delete', [StatusController::class, 'delete'])->name('statuses.delete');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
