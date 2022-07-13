<?php

use App\Http\Controllers\ProductManagementController;
use Illuminate\Support\Facades\Route;

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


Route::get('/', [ProductManagementController::class, 'top'])->middleware(['auth'])->name('top');
Route::get('/list', [ProductManagementController::class, 'list'])->name('list');
Route::get('/newadd', [ProductManagementController::class, 'newadd'])->name('newadd');
Route::get('/confirm', [ProductManagementController::class, 'confirm'])->name('confirm');
Route::post('/storeOrBack', [ProductManagementController::class, 'storeOrBack'])->name('storeOrBack');
Route::get('/complete', [ProductManagementController::class, 'complete'])->name('complete');
Route::get('/contact', [ProductManagementController::class, 'contact'])->name('contact');
Route::post('/productRegister', [ProductManagementController::class, 'productRegister'])->name('productRegister');

require __DIR__.'/auth.php';
