<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use Illuminate\Foundation\Events\VendorTagPublished;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/', function () {
    return view('welcome');
});

Route::get('posts', function() {
    return view('posts/index');
});

Route::get('/posts', [PostController::class, 'index']);

Route::get('/posts/create', [PostController::class, 'create'])->middleware('auth');

Route::Post('/posts/store', [PostController::class, 'store']) ->name('posts.store')->middleware('auth');

Route::get('/posts/{id}', [PostController::class, 'show']);

require __DIR__.'/auth.php';
