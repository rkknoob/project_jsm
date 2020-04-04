<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminSubmenuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_submenu', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('sub_id')->nullable();
            $table->string('name_en')->nullable();
            $table->string('name_th')->nullable();
            $table->string('icon')->nullable();
            $table->string('uri')->nullable();
            $table->integer('sort_id')->nullable();
            $table->string('show')->default('Y');
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
        Schema::dropIfExists('admin_submenu');
    }
}
