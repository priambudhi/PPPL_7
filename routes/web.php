<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PortalController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\ContactAController;
use App\Http\Controllers\ContactController;
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

Route::get('/',[PortalController::class,'welcome'])->name('welcome');
Route::get('/menu',[PortalController::class,'menu'])->name('menu');
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

    Route::middleware('auth')
     ->prefix('admin')
     ->name('admin.')
     ->group(function(){
        Route::prefix('menu')
         ->name('menu.')
         ->group(function(){
            Route::get('/',[MenuController::class,'index'])->name('index');
            Route::post('/',[MenuController::class,'store'])->name('store');
            Route::put('/',[MenuController::class,'update'])->name('update');
            Route::delete('/',[MenuController::class,'destroy'])->name('destroy');

            Route::post('/fetch',[MenuController::class,'fetch'])->name('fetch');

            Route::post('/cat-add',[MenuController::class,'cat_store'])->name('cat_store');
            Route::put('/cat-update',[MenuController::class,'cat_update'])->name('cat_update');
            Route::delete('/cat-destroy',[MenuController::class,'cat_destroy'])->name('cat_destroy');
         });
        Route::prefix('contact')
         ->name('contact.')
         ->group(function(){
            Route::get('/',[ContactAController::class,'index'])->name('index');
        });
    });

    Route::post('/contact',[ContactController::class,'store'])->name('contact_store');