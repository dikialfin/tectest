<?php

namespace App\Http\Controllers\Jabatan;


class ViewController extends MainController
{
    public function indexView($paginationNumber = null) {
        $data = [
            'dataJabatan' => $this->getAllDataJabatan()
        ];
        return view("Jabatan/index",$data);
    }
}
