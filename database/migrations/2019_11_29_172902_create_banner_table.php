<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBannerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banner', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('type',1)->nullable();
            $table->integer('id_category')->nullable(); 
            $table->integer('id_product')->nullable(); 
            $table->integer('seq')->nullable();
            $table->text('name_en')->nullable();
            $table->text('name_th')->nullable();
            $table->text('img_en')->nullable();
            $table->text('img_th')->nullable();
            $table->string('is_active',1)->nullable();
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
        Schema::dropIfExists('banner');
    }
}
