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
        DB::table('users')->insert([
            ['id'=>'1','name'=>'Vương Trần','email'=>'vuongtran@noithatgiongtrom.com','password'=>bcrypt('0968580776')],
            ['id'=>'2','name'=>'Tuyến Nguyễn','email'=>'tuyennguyen@noithatgiongtrom.com','password'=>bcrypt('0902560665')],
            ['id'=>'3','name'=>'Tiến Lê','email'=>'tienle@noithatgiongtrom.com','password'=>bcrypt('0902560665')],
            ['id'=>'4','name'=>'admin','email'=>'admin@noithatgiongtrom.com','password'=>bcrypt('0968580776')],
        ]);
    }
}
