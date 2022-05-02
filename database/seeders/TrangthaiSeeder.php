<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
class TrangthaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('trangthais')->insert([
            ['ten_trangthai'=>'Con Hang'],
            ['ten_trangthai'=>'Het Hang'],
        ]);
    }
}
