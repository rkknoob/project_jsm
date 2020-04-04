<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStoreCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('store_category', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('name_en')->nullable();
            $table->text('name_th')->nullable();
            $table->string('is_active')->nullable();
            $table->integer('sorting')->nullable();
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
        Schema::dropIfExists('store_category');
    }
}
