<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('fname')->nullable();// ชื่อ
            $table->text('lname')->nullable();// นามสกุล
            $table->text('email')->nullable();// อีเมล
            $table->text('password')->nullable();// พาส
            $table->text('phone')->nullable();// เบอร
            $table->text('role')->nullable();// สิทธิ
            $table->text('token')->nullable();// โทเคน
            $table->string('is_active')->nullable();// สถานนะ
            $table->text('reset_password_token')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('admin');
    }
}
