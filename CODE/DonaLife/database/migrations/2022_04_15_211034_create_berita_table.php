<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBeritaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('berita', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('campaign_barang_id')->nullable();
            $table->unsignedBigInteger('campaign_uang_id')->nullable();
            $table->longtext('deskripsi');
            $table->string('foto');
            $table->datetime('tanggal_selesai_campaign');
            $table->datetime('tanggal_mulai_campaign');
            $table->timestamps();
        });
        Schema::table('berita', function ($table) {
            $table->foreign('campaign_barang_id')->references('id')->on('campaign_barang')->onDelete('NO ACTION')->onUpdate('NO ACTION');
            $table->foreign('campaign_uang_id')->references('id')->on('campaign_uang')->onDelete('NO ACTION')->onUpdate('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('berita');
    }
}
