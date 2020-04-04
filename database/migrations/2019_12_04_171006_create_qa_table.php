<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {///`topic_qa`
        Schema::create('topic_qa', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('title')->nullable()->comment('หัวเรื่อง');
            $table->string('type')->nullable()->comment('ประเภท');
            $table->longText('content')->nullable()->comment('เนื้อเรื่อง');
            $table->text('code')->nullable()->comment('รหัส capchat');
            $table->integer('hit')->nullable()->comment('จำนวนเข้าดู');
            $table->string('status')->nullable()->comment('สถานนะ');
            $table->integer('user_id')->nullable()->comment('คนตั้งtopic');
            $table->integer('product_id')->nullable()->comment('Product');
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
        Schema::dropIfExists('topic_qa');
    }
}
