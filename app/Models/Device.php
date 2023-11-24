<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    use HasFactory;
    const INACTIVE = 0;
    const ACTIVE = 1;
    protected $fillable = [
        'name',
        'serial',
        'img',
        'is_active',
        'description',
    ];
}
