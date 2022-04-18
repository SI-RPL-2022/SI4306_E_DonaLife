<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegionalModule extends Migration
{
    public function up()
    {
        Schema::create('province', function (Blueprint $table) {
            $table->id('id');
            $table->string('name');
        });
        Schema::create('city', function (Blueprint $table) {
            $table->id('id');
            $table->integer('province_id');
            $table->string('name');
            $table->string('code',6);
        });
        Schema::create('subdistrict', function (Blueprint $table) {
            $table->id('id');
            $table->integer('city_id');
            $table->string('name');
        });
    }
    public function down()
    {
        Schema::dropIfExists('province');
        Schema::dropIfExists('city');
        Schema::dropIfExists('subdistrict');
    }
}
