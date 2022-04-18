<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaketDonasiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paket_donasi', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('campaign_barang_id');
            $table->integer('paket_id');
            $table->string('photo_paket');
            $table->string('photo_resi');
            $table->longtext('pesan');
            $table->timestamps();
        });
        Schema::table('paket_donasi', function ($table) {
            $table->foreign('campaign_barang_id')->references('id')->on('campaign_barang')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('paket_donasi');
    }
}
