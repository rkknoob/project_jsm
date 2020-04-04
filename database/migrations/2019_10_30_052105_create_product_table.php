<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('sku')->nullable();// อ้างอิง รหัสสินค้า
            $table->text('name_en')->nullable(); //เก็บรชื่อรูป
            $table->text('name_th')->nullable(); //เก็บรชื่อรูป
            $table->text('img_color')->nullable(); //เก็บรูป
            $table->text('img_product')->nullable(); //เก็บรูป
            $table->integer('product_details_id')->nullable(); //ผูก Product
            $table->integer('stock')->nullable(); //จำนวนที่สินค้ามี
            $table->string('is_active',1)->nullable(); //สถานะ

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
        Schema::dropIfExists('product');
    }
}
