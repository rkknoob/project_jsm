<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArtisttipTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('artist_tip', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('title_en')->nullable();// ชื่อ
            $table->text('title_th')->nullable();// ชื่อ
            $table->text('img_banner')->nullable();// ชื่อ
            $table->text('detail_en')->nullable();// ชื่อ
            $table->text('detail_th')->nullable();// ชื่อ
            $table->string('is_active')->nullable();// เเก็บลิงค์
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('artist_tip');
    }
}
