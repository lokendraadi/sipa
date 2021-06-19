<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuratMasuksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surat_masuks', function (Blueprint $table) {
            $table->id();
            $table->char('no_surat');
            $table->integer('no_agenda');
            $table->date('tanggal_pkpa')->format('d.m.Y');
            $table->date('tanggal_surat')->format('d.m.Y');
            $table->text('perihal');
            $table->string('dari');
            $table->string('kepada');
            $table->string('disposisi');
            $table->string('posisi_terakhir');
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
        Schema::dropIfExists('surat_masuks');
    }
}
