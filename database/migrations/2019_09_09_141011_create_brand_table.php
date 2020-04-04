<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBrandTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('brand_magazine', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('img_banner')->nullable();// banner
            $table->text('topic_name')->nullable();// หัวข้อ
            $table->string('is_active')->nullable();// สถานนะ
            $table->string('type',1)->nullable();// สถานนะ
            $table->text('link_video')->nullable();// หัวข้อ
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
        Schema::dropIfExists('brand_magazine');
    }
}
