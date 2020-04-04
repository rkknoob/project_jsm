<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBrandJsmTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('brandjsm', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('name_en')->nullable();
            $table->text('name_th')->nullable();
            $table->string('type',1)->nullable();
            $table->string('is_active',1)->nullable();
            $table->text('img_en')->nullable();
            $table->text('img_th')->nullable();
            $table->longText('detail_film')->nullable();
            $table->longText('detail_en')->nullable();
            $table->longText('detail_th')->nullable();
            $table->text('link_video')->nullable();
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
        Schema::dropIfExists('brandjsm');
    }
}
