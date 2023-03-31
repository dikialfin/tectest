<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tb_pegawai', function (Blueprint $table) {
            $table->integer('id_pegawai')->autoIncrement();
            $table->integer('id_jabatan');
            $table->string('nama_lengkap','70');
            $table->text('alamat');
            $table->string('tempat_lahir','50');
            $table->date('tanggal_lahir');
            $table->foreign('id_jabatan')->references('id_jabatan')->on('tb_jabatan_pegawai')->restrictOnDelete()->cascadeOnUpdate();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
