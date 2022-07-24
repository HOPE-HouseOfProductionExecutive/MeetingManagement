<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meetings', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('title_id')->references('id')->on('titles')->onUpdate('cascade')->onDelete('cascade');
            $table->string('tindak_lanjut', 255);
            $table->string('SKPD', 255);
            $table->string('progress', 255);
            $table->string('data_pendukung', 255)->nullable();
            $table->string('keterangan');
            $table->date('waktu_selesai');
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
        Schema::dropIfExists('meetings');
    }
};
