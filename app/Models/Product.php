<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'price',
        'description',
        'img',
        'category',
        'quantity'
    ];

    public function subCategory() {
        return $this->hasOne(SubCategory::class, 'parent_category_id');
    }
}
