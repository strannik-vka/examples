<?php

use App\Http\Controllers\DiscountController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\PaymentController;
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

Route::get('/', [IndexController::class, 'index'])->name('index');

Route::get('/mailing/access', function () {
    return view('mailing.access');
})->name('mailing.access');

Route::post('/payment/store', [PaymentController::class, 'store'])->name('payment.store');

Route::post('/form/fill', [FormController::class, 'fill'])->name('form.fill');

Route::get('/discount', [DiscountController::class, 'index']);

require __DIR__ . '/auth.php';
