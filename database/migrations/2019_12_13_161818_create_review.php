<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReview extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('review', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('title')->nullable(); //ชื่ออังกฤษ
            $table->integer('product_id')->nullable();
            $table->integer('user_id')->nullable();
            $table->text('score')->nullable();
            $table->longText('content')->nullable();
            $table->string('status')->nullable();
            $table->integer('hit')->nullable();
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
        Schema::dropIfExists('review');
    }
}
