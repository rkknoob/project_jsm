<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFrontlangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('frontlang', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('subject_en')->nullable();
            $table->text('subject_th')->nullable();
            $table->text('summary_en')->nullable();
            $table->text('summary_th')->nullable();
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
        Schema::dropIfExists('frontlang');
    }
}
