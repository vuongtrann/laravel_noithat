<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class ChitietLoaisanphamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('chitiet_loaisanphams')->insert([
            ['ten_chitiet_loaisanpham'=>'Ban Go Cam','loaisanpham_id'=>1],
            ['ten_chitiet_loaisanpham'=>'Ban Go Xa Cu','loaisanpham_id'=>1],
            ['ten_chitiet_loaisanpham'=>'Tu Sat','loaisanpham_id'=>2],
            ['ten_chitiet_loaisanpham'=>'Tu Go','loaisanpham_id'=>2],
            ['ten_chitiet_loaisanpham'=>'Salon Go Cam','loaisanpham_id'=>3],
            ['ten_chitiet_loaisanpham'=>'Salon Nem','loaisanpham_id'=>3],
        ]);
    }
}
