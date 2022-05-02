<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class LoaisanphamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('loaisanphams')->insert([
            ['ten_loaisanpham'=>'Ban'],
            ['ten_loaisanpham'=>'Tu'],
            ['ten_loaisanpham'=>'Salon'],
            ['ten_loaisanpham'=>'Ghe'],
        ]);
    }
}
