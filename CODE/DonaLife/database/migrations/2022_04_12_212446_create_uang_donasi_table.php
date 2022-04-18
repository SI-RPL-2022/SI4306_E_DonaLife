ab<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUangDonasiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('uang_donasi', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('campaign_uang_id');
            $table->bigInteger('nominal');
            $table->string('photo');
            $table->longtext('pesan');
            $table->timestamps();
        });
        Schema::table('uang_donasi', function ($table) {
            $table->foreign('campaign_uang_id')->references('id')->on('campaign_uang')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('uang_donasi');
    }
}
