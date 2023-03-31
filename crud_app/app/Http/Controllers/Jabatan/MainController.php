<?php

namespace App\Http\Controllers\Jabatan;

use App\Models\JabatanModel;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

class MainController extends BaseController
{
    protected $jabatanModel;
    
    public function _construct() {
        $this->jabatanModel = new JabatanModel();
    }

    public function getAllDataJabatan() {
        $dataJabatan = [];
        if (count(JabatanModel::get()) > 0) {
            foreach (JabatanModel::get() as $key) {
                $dataJabatan[] = [
                    'id_jabatan' => $key->id_jabatan,
                    'nama_jabatan' => $key->nama_jabatan,
                ];
            }
            return $dataJabatan;
        }
    }

    public function getDataJabatanById($id_jabatan) {
       return JabatanModel::where('id_jabatan',$id_jabatan)->first();
    }

    public function editDataJabatan(Request $request) {

        $request->validate([
            'nama_jabatan' => 'required|string|unique:App\Models\JabatanModel,nama_jabatan'
        ]);


        
        JabatanModel::where('id_jabatan',$request->input('id_jabatan'))->update([
            'nama_jabatan' => $request->input('nama_jabatan'),
        ]);


        
    }
    public function tambahDataJabatan(Request $request) {

        $request->validate([
            'nama_jabatan' => 'required|string|unique:App\Models\JabatanModel,nama_jabatan'
        ]);

        JabatanModel::insert([
            'nama_jabatan' => $request->input('nama_jabatan'),
        ]);

        
        return redirect('/');

    }

    public function deleteDataJabatan(Request $request) {
        JabatanModel::where('id_jabatan',json_decode($request->getContent())->id_jabatan)->delete();
    }
}
