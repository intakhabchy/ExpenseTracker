<?php

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/api-token-login', function(Request $request) {
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    $user = \App\Models\User::where('email', $request->email)->first();

    if (!$user || !\Illuminate\Support\Facades\Hash::check($request->password, $user->password)) {
        return response()->json(['message' => 'Invalid credentials'], 401);
    }

    $token = $user->createToken('api-token')->plainTextToken;

    return response()->json([
        'user' => $user,
        'token' => $token
    ]);
});

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/categories', [App\Http\Controllers\CategoryController::class, 'index'])->name('categories.index')->middleware('auth:sanctum');
    Route::get('/categories/{id}', [App\Http\Controllers\CategoryController::class, 'categoryById'])->name('categories.categoryById')->middleware('auth:sanctum');
    Route::post('/categories', [App\Http\Controllers\CategoryController::class, 'store'])->name('categories.store');

    Route::get('/categorytypes', [App\Http\Controllers\CategoryTypeController::class, 'index'])->name('categorytypes.index');
    
    Route::get('/currencies', [App\Http\Controllers\CurrencyController::class, 'index'])->name('currencies.index');

    Route::get('/wallets', [App\Http\Controllers\WalletController::class, 'index'])->name('wallets.index');
    Route::post('/wallets', [App\Http\Controllers\WalletController::class, 'store'])->name('wallets.store');
    Route::get('/walletByUser', [App\Http\Controllers\WalletController::class, 'walletByUser'])->name('walletByUser');

    Route::get('/costs', [App\Http\Controllers\CostController::class, 'index'])->name('costs.index');
    Route::post('/costs', [App\Http\Controllers\CostController::class, 'store'])->name('costs.store');
});

