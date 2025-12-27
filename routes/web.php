<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

Route::get('/categories', [App\Http\Controllers\CategoryController::class, 'index'])->name('categories.index');
Route::post('/categories', [App\Http\Controllers\CategoryController::class, 'store'])->name('categories.store');

Route::get('/categorytypes', [App\Http\Controllers\CategoryTypeController::class, 'index'])->name('categorytypes.index');
Route::get('/currencies', [App\Http\Controllers\CurrencyController::class, 'index'])->name('currencies.index');

Route::get('/wallets', [App\Http\Controllers\WalletController::class, 'index'])->name('wallets.index');
Route::post('/wallets', [App\Http\Controllers\WalletController::class, 'store'])->name('wallets.store');
Route::get('/walletByUser/{user_id}', [App\Http\Controllers\WalletController::class, 'walletByUser'])->name('walletByUser');

Route::get('/costs', [App\Http\Controllers\CostController::class, 'index'])->name('costs.index');

require __DIR__.'/auth.php';
