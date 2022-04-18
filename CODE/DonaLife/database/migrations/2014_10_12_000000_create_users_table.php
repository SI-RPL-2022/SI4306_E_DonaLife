<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{

    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('telepon',16)->unique();
            $table->string('email')->unique();
            $table->string('nik',16)->unique()->nullable();
            $table->string('ktp_photo')->nullable();
            $table->string('selfie_photo')->nullable();
            $table->longtext('alamat')->nullable();
            $table->integer('province_id')->nullable();
            $table->integer('city_id')->nullable();
            $table->integer('subdistrict_id')->nullable();
            $table->string('postcode',6)->nullable();
            $table->string('rekening')->nullable();
            $table->string('nama_bank')->nullable();
            $table->string('password');
            $table->enum('role',['admin','donatur'])->default('donatur');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
}
