<?php

namespace App\Http\Controllers\Kontrak;

class ViewController extends MainController
{
    public function indexView() {
        return view("Kontrak/index");
    }
}
