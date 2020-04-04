<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePopupTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('popup', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('name_en')->nullable(); //ชื่ออังกฤษ
            $table->text('name_th')->nullable(); //ชื่อไทย
            $table->text('img_en')->nullable();
            $table->text('img_th')->nullable();
            $table->text('link')->nullable();
            $table->text('user_id')->nullable();
            $table->string('is_active')->nullable();
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
        Schema::dropIfExists('popup');
    }
}
