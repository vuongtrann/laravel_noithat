<?php

namespace Database\Seeders;

use App\Models\Chitiet_Loaisanpham;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
       // $this->call(LoaisanphamSeeder::class);
        //$this->call(ChitietLoaisanphamSeeder::class);
        //$this->call(TrangthaiSeeder::class);
        //$this->call(SanphamSeeder::class);
        $this->call(NhanvienSeeder::class);
    }
}
