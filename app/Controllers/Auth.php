<?php

namespace App\Controllers;

use CodeIgniter\Controller;

//Libraries para cifrar
use App\Libraries\Hash;
use \App\Models\Users;
use CodeIgniter\HTTP\ResponseInterface;

class Auth extends Controller

{

    public function __construct()
    {
        helper(['url', 'form']);
    }

    public function index()
    {
        $datos = [
            'title' => "Login"
        ];
        return view('auth/login', $datos);
    }

    public function register()
    {
        return view('auth/register');
    }

  

    function check()
    {

        $session = session();
        $validation = \Config\Services::validation();
        if (!$this->validate('loginUser')) {
            return $this->getRespose(['error' => $validation->getErrors()]);
        }
        $correo = $this->request->getPost('correo');
        $password = $this->request->getPost('contrasenia');

       $modelUsers = new Users();

       $query=$modelUsers->selectEmail($correo);
       $temp=$query[0];
        if ($temp['estado'] == 1) {
            $checkpassword = Hash::check($password, $temp['clave']);
            if (!$checkpassword) {
                $error=[
                    'contrasenia'=>'Contraseña incorrecta'
                ];
                return $this->getRespose(['error' =>$error]);
            }
            $perid=$temp['id_user'];
            $nombre=$temp['nombre'].' '.$temp['apellido'];
            $rol=$temp['rol'];

            $data=[
                "loggedUser"=>$perid,
                "nombre"=>$nombre,
                "rol"=>$rol,
                "id_rol"=>$temp['id_rol'],
            ];
            session()->set($data);
            return $this->getRespose(['success' => 'Usuario Login']);
        }
        $error=[
            'contrasenia'=>'Usuario bloqueado...!'
        ];
        return $this->getRespose(['error' =>$error]);




    }


    function logout()
    {

        if (session()->has('loggedUser')) {
            session()->remove('loggedUser');

            return redirect()->to('/auth?access=out')->with('fail', 'You are logged out !');
        }
    }

    public function getRespose(array $responseBody, int $code = ResponseInterface::HTTP_OK)
    {
        return $this->response->setStatusCode($code)->setJSON($responseBody);
    }
}