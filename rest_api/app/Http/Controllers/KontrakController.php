<?php

namespace App\Http\Controllers;

use App\Models\KontrakModel;

class KontrakController extends Controller
{
    public function getAllKontrak() {

        $dataKontrak = KontrakModel::
        join('tb_pegawai', 'tb_kontrak.id_pegawai', '=', 'tb_pegawai.id_pegawai')
        ->join('tb_jabatan_pegawai','tb_pegawai.id_jabatan', '=', 'tb_jabatan_pegawai.id_jabatan')
        ->select(
            "tb_kontrak.id_kontrak",
            "tb_pegawai.nama_lengkap",
            "tb_kontrak.join_date",
            "tb_kontrak.end_date",
        )
        ->get();

        return response()->json($dataKontrak,200);
    }

    public function getKontrakByIdPegawai($id_pegawai) {

        $dataKontrak = KontrakModel::
        join('tb_pegawai', 'tb_kontrak.id_pegawai', '=', 'tb_pegawai.id_pegawai')
        ->join('tb_jabatan_pegawai','tb_pegawai.id_jabatan', '=', 'tb_jabatan_pegawai.id_jabatan')
        ->where('tb_kontrak.id_pegawai','=',$id_pegawai)
        ->first();

        return response()->json($dataKontrak,200);
    }
}
