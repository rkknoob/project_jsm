<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductDescriptionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_description', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('seq')->nullable(); //เรียก ลำดับ แสดง
            $table->integer('product_id')->nullable(); //ผูกกับ Product
            $table->longText('detail_type')->nullable();
            $table->text('img_en')->nullable(); // รูปไทย
            $table->text('img_th')->nullable(); // รปอังกฤษ
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
        Schema::dropIfExists('product_description');
    }
}
