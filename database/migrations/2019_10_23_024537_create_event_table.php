<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('event_type')->nullable();//
            $table->text('banner1')->nullable();//
            $table->text('banner2')->nullable();//
            $table->text('topic_en')->nullable();//
            $table->text('topic_th')->nullable();//
            $table->longText('detail_en')->nullable();//
            $table->longText('detail_th')->nullable();//
            $table->dateTime('start_date');
            $table->dateTime('end_date');
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
        Schema::dropIfExists('event');
    }
}
