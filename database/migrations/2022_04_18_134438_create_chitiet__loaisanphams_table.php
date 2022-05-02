<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChitietLoaisanphamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chitiet_loaisanphams', function (Blueprint $table) {
            $table->id();
            $table->string('ten_chitiet_loaisanpham');
            $table->unsignedBigInteger('loaisanpham_id');
            $table->timestamps();

            $table->foreign('loaisanpham_id')->references('id')->on('loaisanphams');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chitiet__loaisanphams');
    }
}
