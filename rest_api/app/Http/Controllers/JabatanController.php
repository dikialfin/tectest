<?php

namespace App\Http\Controllers;

use App\Models\JabatanModel;
use App\Models\PegawaiModel;

class JabatanController extends Controller
{
    public function getAllJabatan() {

        $dataPegawai = JabatanModel::get();

        return response()->json($dataPegawai,200);
    }

    public function getJabatanById($id_jabatan) {

        $dataJabatan = JabatanModel::where('id_jabatan',$id_jabatan)
        ->first();

        return response()->json($dataJabatan,200);
    }
}
