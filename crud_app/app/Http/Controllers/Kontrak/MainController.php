<?php

namespace App\Http\Controllers\Kontrak;

use App\Models\KontrakModel;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

class MainController extends BaseController
{
    protected $kontrakModel;
    
    public function _construct() {
        $this->kontrakModel = new KontrakModel();
    }

    public function editDataKontrak(Request $request) {

        $request->validate([
            'id_pegawai' => 'required',
            'join_date' => 'required',
            'end_date' => 'required',
        ]);


        
        KontrakModel::where('id_pegawai',$request->input('id_pegawai'))->update([
            'join_date' => $request->input('join_date'),
            'end_date' => $request->input('end_date'),
        ]);


        
    }


    public function tambahDataKontrak(Request $request) {

        $request->validate([
            'id_pegawai' => 'required|string|unique:App\Models\KontrakModel,id_pegawai',
            'join_date' => 'required',
            'end_date' => 'required'
        ]);

        KontrakModel::insert([
            'id_pegawai' => $request->input('id_pegawai'),
            'join_date' => $request->input('join_date'),
            'end_date' => $request->input('end_date'),
        ]);

        
        return redirect('/');

    }

    public function deleteDataKontrak(Request $request) {
        KontrakModel::where('id_kontrak',json_decode($request->getContent())->id_kontrak)->delete();
    }
}
