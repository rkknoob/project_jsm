<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArtistTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('artist', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('name_en')->nullable();// ชื่อ
            $table->longText('img_url')->nullable(); // ชื่อ
            $table->longText('img_size')->nullable(); // ไซค
            $table->longText('type')->nullable(); // ประเภท
            $table->string('is_active',1)->nullable();//สถานะว่า ใช้รึไม่
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
        Schema::dropIfExists('artist');
    }
}
