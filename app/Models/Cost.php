<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cost extends Model
{
    protected $fillable = [
        'wallet_id',
        'category_id',
        'user_id',
        'debit',
        'credit',
        'balance',
        'created_by',
        'updated_by',
    ];

    public function wallet()
    {
        return $this->belongsTo(Wallet::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
