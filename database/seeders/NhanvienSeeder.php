<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NhanvienSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('nhanviens')->insert([
            ['id'=>'admin','ten_nhanvien'=>'Quản trị viên','matkhau'=>'admin123'],
        ]);
    }
}
