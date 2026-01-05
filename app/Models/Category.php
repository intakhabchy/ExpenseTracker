<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'category_name',
        'category_type_id',
        'created_by',
    ];

    public function type()
    {
        return $this->belongsTo(CategoryType::class, 'category_type_id');
    }

    public function costs()
    {
        return $this->hasMany(Cost::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
