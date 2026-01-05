<?php

namespace App\Http\Controllers;

use App\Models\Wallet;
use Illuminate\Http\Request;

class WalletController extends Controller
{
    public function index()
    {
        $wallets = Wallet::with(['currency','user','creator'])->get();
        return response()->json($wallets);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'wallet_name' => 'required|string|max:255',
            'currency_id' => 'required|exists:currencies,id',
            'user_id' => 'required|exists:users,id',
            'created_by' => 'required|exists:users,id',
        ]);

        $wallet = Wallet::create($validatedData);

        return response()->json($wallet, 201);
    }

    public function walletByUser(Request $request)
    {
        $userId = $request->user()->id; // get currently authenticated user

        $wallets = Wallet::with(['currency','user','creator'])
            ->where('user_id', $userId)
            ->get();

        return response()->json($wallets);
    }
}
