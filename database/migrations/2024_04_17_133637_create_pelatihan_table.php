<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePelatihanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pelatihan', function (Blueprint $table) {
            $table->id();
            $table->string('nik');
            $table->string('nama');
            $table->string('nama_pelatihan');
            $table->string('kompetensi_yang_ditingkatkan');
            $table->integer('jumlah_hari');
            $table->string('penyelenggara');
            $table->date('tgl_mulai');
            $table->date('tgl_selesai');
            $table->enum('jenis_pelatihan', ['Internal', 'Publik']);
            $table->enum('eviden', ['Daftar hadir', 'Sertifikat', 'Notadinas']);
            $table->text('keterangan')->nullable();
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
        Schema::dropIfExists('pelatihan');
    }
}


