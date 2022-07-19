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
Route::post('/productRegister', [ProductManagementController::class, 'productRegister'])->name('productRegister');
Route::get('/confirm', [ProductManagementController::class, 'confirm'])->name('confirm');
Route::post('/storeOrBack', [ProductManagementController::class, 'storeOrBack'])->name('storeOrBack');
Route::get('/complete', [ProductManagementController::class, 'complete'])->name('complete');
Route::post('/delete', [ProductManagementController::class, 'delete'])->name('delete');
Route::get('/edit/{id}', [ProductManagementController::class, 'edit'])->name('edit');
Route::post('/editValidateSession', [ProductManagementController::class, 'editValidateSession'])->name('editValidateSession');
Route::get('/editConfirm', [ProductManagementController::class, 'editConfirm'])->name('editConfirm');
Route::post('/updateOrBack', [ProductManagementController::class, 'updateOrBack'])->name('updateOrBack');
Route::get('/updateComplete', [ProductManagementController::class, 'updateComplete'])->name('updateComplete');
Route::get('/contact', [ProductManagementController::class, 'contact'])->name('contact');
Route::post('/contactValidateSession', [ProductManagementController::class, 'contactValidateSession'])->name('contactValidateSession');
Route::get('/contactConfirm', [ProductManagementController::class, 'contactConfirm'])->name('contactConfirm');
Route::post('/sendOrBack', [ProductManagementController::class, 'sendOrBack'])->name('sendOrBack');
Route::post('/contactMail', [ProductManagementController::class, 'contactMail'])->name('contactMail');
Route::get('/sendComplete', [ProductManagementController::class, 'sendComplete'])->name('sendComplete');
Route::get('/mail', [ProductManagementController::class, 'mail'])->name('mail');
Route::get('/mypage', [ProductManagementController::class, 'mypage'])->name('mypage');
Route::post('/favorite', [ProductManagementController::class, 'favorite'])->name('favorite');


require __DIR__.'/auth.php';
