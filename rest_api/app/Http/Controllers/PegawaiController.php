<?php

namespace App\Http\Controllers;

use App\Models\PegawaiModel;

class PegawaiController extends Controller
{
    public function getAllPegawai() {

        $dataPegawai = PegawaiModel::
        join('tb_jabatan_pegawai', 'tb_jabatan_pegawai.id_jabatan', '=', 'tb_pegawai.id_jabatan')
        ->select(
            "tb_pegawai.id_pegawai",
            "tb_pegawai.nama_lengkap",
            "tb_pegawai.alamat",
            "tb_pegawai.tempat_lahir",
            "tb_pegawai.tanggal_lahir",
            "tb_jabatan_pegawai.nama_jabatan"
        )
        ->get();

        return response()->json($dataPegawai,200);
    }

    public function getPegawaiById($id_pegawai) {

        $dataPegawai = PegawaiModel::where('tb_pegawai.id_pegawai',$id_pegawai)
        ->join('tb_jabatan_pegawai', 'tb_jabatan_pegawai.id_jabatan', '=', 'tb_pegawai.id_jabatan')
        ->select(
            "tb_pegawai.id_pegawai",
            "tb_pegawai.nama_lengkap",
            "tb_pegawai.alamat",
            "tb_pegawai.tempat_lahir",
            "tb_pegawai.tanggal_lahir",
            "tb_jabatan_pegawai.nama_jabatan"
        )->first();

        return response()->json($dataPegawai,200);
    }
}
