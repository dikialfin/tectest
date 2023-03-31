<?php

namespace App\Http\Controllers\Pegawai;

use App\Http\Controllers\Jabatan\MainController as JabatanMainController;
use App\Models\PegawaiModel;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

class MainController extends BaseController
{
    protected $jabatanMainController;

    public function __construct()
    {
        $this->jabatanMainController = new JabatanMainController();
    }

    public function getAllDataPegawai($pageNumber = null) {
        $endpoint = "http://localhost:9000/pegawai";

        if ($pageNumber !== null) {
            $endpoint .= "?page=$pageNumber";
        }

        $client = new \GuzzleHttp\Client();

        $response = $client->get($endpoint);

        return json_decode($response->getBody()->getContents(),true);
    }

    public function getDetailPegawai($id_pegawai) {
        $endpoint = "http://localhost:9000/pegawai/$id_pegawai";

        $client = new \GuzzleHttp\Client();

        $response = $client->get($endpoint);

        return json_decode($response->getBody()->getContents(),true);
    }

    public function editDataPegawai(Request $request) {

        $request->validate([
            'nama_lengkap' => 'required|string',
            'alamat' => 'required|string',
            'tempat_lahir' => 'required|string',
            'tanggal_lahir' => 'required',
            'id_jabatan' => 'required|integer',
        ]);

        
        PegawaiModel::where('id_pegawai',$request->input('id_pegawai'))->update([
            'id_jabatan' => $request->input('id_jabatan'),
            'nama_lengkap' => $request->input('nama_lengkap'),
            'alamat' => $request->input('alamat'),
            'tempat_lahir' => $request->input('tempat_lahir'),
            'tanggal_lahir' => $request->input('tanggal_lahir'),
        ]);


        
    }
    public function tambahDataPegawai(Request $request) {

        $request->validate([
            'nama_lengkap' => 'required|string',
            'alamat' => 'required|string',
            'tempat_lahir' => 'required|string',
            'tanggal_lahir' => 'required',
            'id_jabatan' => 'required|integer',
        ]);

        PegawaiModel::insert([
            'id_jabatan' => $request->input('id_jabatan'),
            'nama_lengkap' => $request->input('nama_lengkap'),
            'alamat' => $request->input('alamat'),
            'tempat_lahir' => $request->input('tempat_lahir'),
            'tanggal_lahir' => $request->input('tanggal_lahir'),
        ]);

        
        return redirect('/');

    }

    public function deleteDataPegawai(Request $request) {
        PegawaiModel::where('id_pegawai',json_decode($request->getContent())->id_pegawai)->delete();
    }
    
}
