<?php

namespace App\Http\Controllers\Pegawai;

use Illuminate\Routing\Controller as BaseController;

class ViewController extends MainController
{
    public function indexView() {
        return view("Pegawai/index");
    }
}
