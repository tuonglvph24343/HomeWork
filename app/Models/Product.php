<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    const INACTIVE_PRODUCT = 0;
    const ACTIVE_PRODUCT = 1;
    protected $fillable = [
        'name',
        'price',
        'price_sale',
        'img',
        'is_active',
        'describe',
    ];
}
