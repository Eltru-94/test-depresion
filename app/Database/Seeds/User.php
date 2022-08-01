<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use App\Libraries\Hash;
class User extends Seeder
{
    public function run()
    {
        $data = [[

                'nombre' =>'Edwin ',
                'apellido'=>'Valenzuela',
                'cedula'=>'1003990460',
                'id_rol'=>'1',
                'correo'=>'edwin@gmail.com',
                'telefono'=>'0961477086',
                'clave'=>Hash::make('12345'),
                'estado'=>1,
        ],[

            'nombre' =>'Alexander Paul',
            'apellido'=>'Torres',
            'cedula'=>'1003648936',
            'id_rol'=>'2',
            'correo'=>'alex@gmail.com',
            'telefono'=>'0961477086',
            'clave'=>Hash::make('12345'),
            'estado'=>1,
        ]];
        foreach($data as $dt){
            $this->db->table('users')->insert($dt);
        }
    }
}
