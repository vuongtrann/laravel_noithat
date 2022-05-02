<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chitiet_Loaisanpham extends Model
{
    use HasFactory;
    protected $fillable = [
        'ten_chitiet_loaisanpham',
        'loaisanpham_id',
        'created_at',
        'updated_at',
    ];
}
