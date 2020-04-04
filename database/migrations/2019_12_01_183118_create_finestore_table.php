<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFinestoreTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('finestore', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('type')->nullable(); //ประเภท
            $table->text('name_en')->nullable(); //ชื่ออังกฤษ
            $table->text('name_th')->nullable(); //ชื่อไทย
            $table->longText('detail_en')->nullable(); //ชื่ออังกฤษ
            $table->longText('detail_th')->nullable(); //ชื่อไทย
            $table->text('img1')->nullable(); // รูปไทย
            $table->text('img2')->nullable(); // รูปไทย
            $table->text('address')->nullable(); // ที่อยู่
            $table->text('tel')->nullable(); // เบอร์
            $table->longText('map')->nullable(); // แผนที่
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
        Schema::dropIfExists('finestore');
    }
}
