<?php

namespace App\Http\Controllers;

use App\Models\Cost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CostController extends Controller
{
    public function index()
    {
        $costs = Cost::with('wallet','category')->get();
        return response()->json($costs);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'user_id' => 'required|exists:users,id',
            'wallet_id' => 'required|exists:wallets,id',
            'category_id' => 'required|exists:categories,id',
            'debit'=> 'nullable|numeric',
            'credit'=> 'nullable|numeric',    
            'created_by' => 'required|exists:users,id',
        ]);

        if ($request->filled('debit') && $request->filled('credit')) {
            return response()->json(['message' => 'Only one of debit or credit is allowed'], 422);
        }

        if (!$request->filled('debit') && !$request->filled('credit')) {
            return response()->json(['message' => 'Either debit or credit is required'], 422);
        }

        return DB::transaction(function () use ($validatedData) {

            $lastBalance = Cost::calculateBalance($validatedData['wallet_id']);

            $newBalance = $lastBalance
                + ($validatedData['credit'] ?? 0)
                - ($validatedData['debit'] ?? 0);

            if ($newBalance < 0) {
                return response()->json(['message' => 'Insufficient balance'], 422);
            }

            $validatedData['balance'] = $newBalance;

            $cost = Cost::create($validatedData);

            return response()->json($cost, 201);
        });
    }
}
