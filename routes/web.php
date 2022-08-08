<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\editController;
use App\Http\Controllers\mainController;
use App\Http\Controllers\shippingDestinationController;
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


Route::get('/', [mainController::class, 'top'])->middleware(['auth'])->name('top');
Route::get('/list', [mainController::class, 'list'])->name('list');
Route::get('/add', [mainController::class, 'add'])->name('add');
Route::post('/productRegister', [mainController::class, 'productRegister'])->name('productRegister');
Route::get('/confirm', [mainController::class, 'confirm'])->name('confirm');
Route::post('/storeOrBack', [mainController::class, 'storeOrBack'])->name('storeOrBack');
Route::get('/complete', [mainController::class, 'complete'])->name('complete');
Route::post('/delete', [mainController::class, 'delete'])->name('delete');
Route::get('/edit/{id}', [mainController::class, 'edit'])->name('edit');
Route::post('/editValidateSession', [mainController::class, 'editValidateSession'])->name('editValidateSession');
Route::get('/editConfirm', [mainController::class, 'editConfirm'])->name('editConfirm');


Route::post('/update', [mainController::class, 'update'])->name('update');
Route::get('/updateComplete', [mainController::class, 'updateComplete'])->name('updateComplete');
Route::get('/contact', [mainController::class, 'contact'])->name('contact');
Route::post('/contactValidateSession', [mainController::class, 'contactValidateSession'])->name('contactValidateSession');
Route::get('/contactConfirm', [mainController::class, 'contactConfirm'])->name('contactConfirm');
Route::post('/sendOrBack', [mainController::class, 'sendOrBack'])->name('sendOrBack');
Route::post('/contactMail', [mainController::class, 'contactMail'])->name('contactMail');
Route::get('/sendComplete', [mainController::class, 'sendComplete'])->name('sendComplete');
Route::get('/mail', [mainController::class, 'mail'])->name('mail');
Route::get('/mypage', [mainController::class, 'mypage'])->name('mypage');
Route::post('/favorite', [mainController::class, 'favorite'])->name('favorite');

Route::group(['prefix' => 'cart'], function () {
  Route::post('/add', [CartController::class, 'add'])->name('cart.add');
  Route::get('/', [CartController::class, 'cart'])->name('cart');
  Route::post('/delete', [CartController::class, 'delete'])->name('cart.delete');
  Route::post('/buy', [CartController::class, 'buy'])->name('buy');
});

Route::group(['prefix' => 'sd'], function () {
  Route::get('/', [shippingDestinationController::class, 'index'])->name('sd.index');
  Route::post('/delete', [shippingDestinationController::class, 'delete'])->name('sd.delete');
  Route::get('/register', [shippingDestinationController::class, 'register'])->name('sd.register');
  Route::post('/ajaxValidate', [shippingDestinationController::class, 'ajaxValidate'])->name('sd.ajaxValidate');
  Route::post('/store', [shippingDestinationController::class, 'store'])->name('sd.store');
});


require __DIR__ . '/auth.php';
