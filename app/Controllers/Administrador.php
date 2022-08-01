<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Administrador extends BaseController
{
    public function index()
    {
       // print_r("Hola Admin".session('loggedUser').session('nombre').session('rol').session('id_rol'));
        $datos=[
            'title'=>session('rol'),
        ];
        return view('administrador/index',$datos);

    }
}
