<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQaAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('answers_qa', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('qa_id')->nullable(); //topic id
            $table->text('details')->nullable(); //รายละเอยีดในการตอบ
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
        Schema::dropIfExists('answers_qa');
    }
}
