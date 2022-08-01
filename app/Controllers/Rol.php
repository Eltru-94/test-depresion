<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use \App\Models\Roles;


class Rol extends BaseController
{
    public function index()
    {
        $datos=[
            'title'=>'Roles'
        ];
        return view('roles/index',$datos);
    }

    public function selectRoles()
    {

        $modelRoles = new Roles();
        $query=$modelRoles->selectRoles();
        return $this->getRespose([
            'roles'=>$query,
        ]);
    }
}
