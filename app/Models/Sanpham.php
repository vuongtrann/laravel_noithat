<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sanpham extends Model
{
    use HasFactory;
    protected $fillable =[
        'ten_sanpham',
        'chitietloai_id',
        'img_sanpham',
        'mota_sanpham',
        'trangthai_id',
        'gia_sanpham',
        'created_at',
        'updated_at'
    ];
}
