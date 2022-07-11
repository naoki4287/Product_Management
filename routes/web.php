<?php

use App\Http\Controllers\ProductManagement;
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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/', [ProductManagement::class, 'top'])->middleware(['auth'])->name('top');
Route::get('/list', [ProductManagement::class, 'list'])->name('list');
Route::get('/newadd', [ProductManagement::class, 'newadd'])->name('newadd');
Route::get('/contact', [ProductManagement::class, 'contact'])->name('contact');

require __DIR__.'/auth.php';
