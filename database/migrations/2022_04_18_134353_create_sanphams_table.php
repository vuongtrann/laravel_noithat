<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSanphamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sanphams', function (Blueprint $table) {
            $table->id();
            $table->string('ten_sanpham');
            $table->unsignedBigInteger('chitietloai_id');
            $table->string('img_sanpham');
            $table->string('mota_sanpham',500);
            $table->unsignedBigInteger('trangthai_id');
            $table->string('gia_sanpham');
            $table->timestamps();

            //$table->foreign('chitietloai_id')->references('id')->on('chitiet_loaisanphams');
            //$table->foreign('trangthai_id')->references('id')->on('trangthais');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sanphams');
    }
}
