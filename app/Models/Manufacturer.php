<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Manufacturer extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'sub_category_id'
    ];

    public function subCategory() {
        return $this->hasOne(SubCategory::class, 'sub_category_id');
    }

    public function product() {
        return $this->belongsTo(Product::class);
    }
}
