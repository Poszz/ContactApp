<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get(
    '/dashboard',
    [DashboardController::class, 'index']
)->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/contact/create', [ContactController::class, 'create'])->name('contact.create');
    Route::post('/contact/store', [ContactController::class, 'store'])->name('contact.store');
    Route::get('/contact/show/{contactId}', [ContactController::class, 'show'])->name('contact.show');
    Route::get('/contact/edit/{contactId}', [ContactController::class, 'edit'])->name('contact.edit');
    Route::delete('/contact/destroy/{contactId}', [ContactController::class, 'destroy'])->name('contact.destroy');
    Route::put('/contact/update/{contactId}', [ContactController::class, 'update'])->name('contact.update');
});

require __DIR__ . '/auth.php';
