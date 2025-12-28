<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpFoundation\Request;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/categories', [App\Http\Controllers\CategoryController::class, 'index'])->name('categories.index')->middleware('auth:sanctum');
Route::post('/categories', [App\Http\Controllers\CategoryController::class, 'store'])->name('categories.store');

Route::get('/categorytypes', [App\Http\Controllers\CategoryTypeController::class, 'index'])->name('categorytypes.index');
Route::get('/currencies', [App\Http\Controllers\CurrencyController::class, 'index'])->name('currencies.index');

Route::get('/wallets', [App\Http\Controllers\WalletController::class, 'index'])->name('wallets.index');
Route::post('/wallets', [App\Http\Controllers\WalletController::class, 'store'])->name('wallets.store');
Route::get('/walletByUser/{user_id}', [App\Http\Controllers\WalletController::class, 'walletByUser'])->name('walletByUser');

Route::get('/costs', [App\Http\Controllers\CostController::class, 'index'])->name('costs.index');
Route::post('/costs', [App\Http\Controllers\CostController::class, 'store'])->name('costs.store');

require __DIR__.'/auth.php';
