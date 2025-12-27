<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoryType extends Model
{
    protected $fillable = [
        'category_type_name',
        'created_by',
    ];

    public function categories()
    {
        return $this->hasMany(Category::class);
    }
}
