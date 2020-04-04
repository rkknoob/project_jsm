<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('name_en')->nullable();// ชื่อ
            $table->text('name_th')->nullable(); // ชื่อ
            $table->text('cover_img')->nullable(); //เก็บรูป
            $table->text('cover_zoom')->nullable(); //เก็บรูป
            $table->text('display_type')->nullable(); // Y โชว Shade //N ซ่อน
            $table->integer('category_id')->nullable(); //
            $table->decimal('price')->nullable(); // ราคา
            $table->text('size')->nullable(); //
            $table->decimal('spl_price')->nullable(); // ราคาพิเศษ
            $table->longText('detail_th')->nullable(); // รายละเอียดสินค้า
            $table->longText('detail_en')->nullable(); // รายละเอียดสินค้า
            $table->date('start_time')->nullable(); // start
            $table->date('end_time')->nullable(); // end
            $table->string('is_active',1)->nullable();//สถานะว่า ใช้รึไม่
            $table->string('is_bestseller',1)->nullable();//สถานะว่า ใช้รึไม่
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
        Schema::dropIfExists('product_details');
    }
}
