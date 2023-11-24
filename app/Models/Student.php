<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    const INACTIVE_STUDENT = 0;
    const ACTIVE_STUDENT = 1;

    protected $fillable = [
        'name',
        'code',
        'date_of_birth',
        'img',
        'is_active',
    ];
}
