<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCateQaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    { ///ประเภท topic qa
        Schema::create('cate_qa', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable()->comment('ชื่อ');
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
        Schema::dropIfExists('cate_qa');
    }
}
