<?php

namespace App\Controllers;

use App\Libraries\Hash;
use \App\Models\Users;

use App\Controllers\BaseController;

class User extends BaseController
{
    public function index()
    {
        //print_r("Hello User");
        $datos = [
            'title' => 'Usuarios'
        ];
        return view('user/index', $datos);
    }


    public function selectUser()
    {
        $modelUsers = new Users();

        $query = $modelUsers->selectUser();

        return $this->getRespose([
            'users' => $query,
        ]);
    }

    /** Insert new user  */
    public function store()
    {

        $validation = \Config\Services::validation();
        if (!$this->validate('user')) {
            $errors = $validation->getErrors();
            return $this->getRespose([
                'error' => $errors,
            ]);
        }
        $input = $this->getRequestInput($this->request);
        $input['estado'] = 1;
        $input['clave'] = Hash::make($input['clave']);
        unset($input['cclave']);
        $modelUsers = new Users();
        $modelUsers->insert($input);
        return $this->getRespose([
            'success' => "Registrado",
        ]);
    }

    public function userUpdate($id)
    {
        $modelUsers = new Users();
        $query = $modelUsers->selectId($id);
        return $this->getRespose([
            'user' => $query,
        ]);
    }


    public function update()
    {
        $input = $this->getRequestInput($this->request);

        $id_user= $input ['id_user'];
        unset( $input ['id_user']);
        if (!empty(   $input ['clave'])) {
            $input ['clave'] = Hash::make($input['clave']);
            unset( $input ['cclave']);
        }else{
            unset( $input ['clave']);
            unset( $input ['cclave']);
        }

        $validation = \Config\Services::validation();
        if (!$this->validate('updateUser')) {
            $errors = $validation->getErrors();
            return $this->getRespose([
                'error' => $errors,
            ]);
        }

        $modelUsers = new Users();
        $modelUsers->updateUser($input,$id_user);
        return $this->getRespose([
            'success' => "Actualizado",

        ]);
    }

    public function deleteUser()
    {

        $input = $this->getRequestInput($this->request);
        $id_user = $input['id_user'];
        $mensaje = "";
        if ($input['estado'] == 1) {
            $mensaje = "Activado";
        }
        if ($input['estado'] == 0) {
            $mensaje = "Inactivo";
        }
        unset($input['id_user']);
        $modelUser = new Users();
        $query = $modelUser->updateUser($input, $id_user);
        return $this->getRespose([
            'success' => $mensaje,
            'estado' => $input['estado']
        ]);
    }
}
