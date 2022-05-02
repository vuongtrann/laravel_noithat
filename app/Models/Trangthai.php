<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trangthai extends Model
{
    use HasFactory;
    protected $fillable = [
        'ten_trangthai',
        'created_at',
        'updated_at',
    ];
}
