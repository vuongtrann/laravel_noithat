<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loaisanpham extends Model
{
    use HasFactory;
    protected $fillable = [
        'ten_loaisanpham',
        'created_at',
        'updated_at',
    ];
}
