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
        Schema::create('tb_kontrak', function (Blueprint $table) {
            $table->integer('id_kontrak')->autoIncrement();
            $table->integer('id_pegawai');
            $table->date('join_date');
            $table->date('end_date');
            $table->foreign('id_pegawai')->references('id_pegawai')->on('tb_pegawai')->restrictOnDelete()->cascadeOnUpdate();

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
