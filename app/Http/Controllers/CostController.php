<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Cost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CostController extends Controller
{
    public function index()
    {
        $costs = Cost::with('wallet','category')->orderBy('created_at','desc')->get();
        return response()->json($costs);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'wallet_id' => 'required|exists:wallets,id',
            'category_id' => 'required|exists:categories,id',
            'amount'=> 'nullable|numeric',    
        ]);

        $userId = $request->user()->id; // get currently authenticated user

        $validatedData['user_id'] = $userId;
        $validatedData['created_by'] = $userId;

        $category_type_id = Category::where('id', $validatedData['category_id'])->value('category_type_id');

        $debit = 0;
        $credit = 0;
        if($category_type_id == 1){ // expense
            $debit = $request->input('amount');
        }
        else if($category_type_id == 2){    // income
            $credit = $request->input('amount');
        }

        $validatedData['debit'] = $debit;
        $validatedData['credit'] = $credit;

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
