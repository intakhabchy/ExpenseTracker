<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    protected $fillable = [
        'currency_name',
        'created_by',
    ];

    public function wallets()
    {
        return $this->hasMany(Wallet::class);
    }
}
