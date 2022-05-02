<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
class SanphamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sanphams')->insert([
            // ['id'=>1,'ten_sanpham'=>'Ban go cam lai mau do','chitietloai_id'=>1,'img_sanpham'=>'img1.jpg','mota_sanpham'=>'San pham moi voi chat go tuyet voi','trangthai_id'=>1,'gia_sanpham'=>'1234567'],
            // ['id'=>2,'ten_sanpham'=>'Ban go cam xa cu mau nau dat','chitietloai_id'=>2,'img_sanpham'=>'img2.jpg','mota_sanpham'=>'San pham moi voi chat go tuyet voi','trangthai_id'=>2,'gia_sanpham'=>'1234567'],
            // ['id'=>3,'ten_sanpham'=>'Ban go cam lai mau nau','chitietloai_id'=>1,'img_sanpham'=>'img3.jpg','mota_sanpham'=>'San pham moi voi chat go tuyet voi','trangthai_id'=>1,'gia_sanpham'=>'1234567'],
            // ['id'=>4,'ten_sanpham'=>'Tu sat mau vang sieu benh','chitietloai_id'=>3,'img_sanpham'=>'img4.jpg','mota_sanpham'=>'San pham moi voi chat go tuyet voi','trangthai_id'=>2,'gia_sanpham'=>'1234567'],
            // ['id'=>5,'ten_sanpham'=>'Tu sat mau do sieu benh','chitietloai_id'=>4,'img_sanpham'=>'img5.jpg','mota_sanpham'=>'San pham moi voi chat go tuyet voi','trangthai_id'=>1,'gia_sanpham'=>'1234567'],
            // ['id'=>6,'ten_sanpham'=>'Salon go cam lai moi nhat 2022','chitietloai_id'=>5,'img_sanpham'=>'img6.jpg','mota_sanpham'=>'San pham moi voi chat go tuyet voi','trangthai_id'=>2,'gia_sanpham'=>'1234567'],

            ['ten_sanpham'=>'Ban go cam lai mau do','chitietloai_id'=>1,'img_sanpham'=>'img1.jpg','mota_sanpham'=>'San pham moi voi chat go tuyet voi','trangthai_id'=>1,'gia_sanpham'=>'1234567'],
            ['ten_sanpham'=>'Ban go cam xa cu mau nau dat','chitietloai_id'=>2,'img_sanpham'=>'img2.jpg','mota_sanpham'=>'San pham moi voi chat go tuyet voi','trangthai_id'=>2,'gia_sanpham'=>'1234567'],
            ['ten_sanpham'=>'Ban go cam lai mau nau','chitietloai_id'=>1,'img_sanpham'=>'img3.jpg','mota_sanpham'=>'San pham moi voi chat go tuyet voi','trangthai_id'=>1,'gia_sanpham'=>'1234567'],
            ['ten_sanpham'=>'Tu sat mau vang sieu benh','chitietloai_id'=>3,'img_sanpham'=>'img4.jpg','mota_sanpham'=>'San pham moi voi chat go tuyet voi','trangthai_id'=>2,'gia_sanpham'=>'1234567'],
            ['ten_sanpham'=>'Tu sat mau do sieu benh','chitietloai_id'=>4,'img_sanpham'=>'img5.jpg','mota_sanpham'=>'San pham moi voi chat go tuyet voi','trangthai_id'=>1,'gia_sanpham'=>'1234567'],
            ['ten_sanpham'=>'Salon go cam lai moi nhat 2022','chitietloai_id'=>5,'img_sanpham'=>'img6.jpg','mota_sanpham'=>'San pham moi voi chat go tuyet voi','trangthai_id'=>2,'gia_sanpham'=>'1234567'],

        ]);
    }
}
