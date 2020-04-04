<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLinestoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('linestory', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('name_en')->nullable();//
            $table->text('name_th')->nullable();//
            $table->text('banner_en')->nullable();//
            $table->text('banner_th')->nullable();//
            $table->longText('detail_en')->nullable();//
            $table->longText('detail_th')->nullable();//
            $table->string('is_active',1)->nullable();// สถานนะ
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
        Schema::dropIfExists('linestory');
    }
}
