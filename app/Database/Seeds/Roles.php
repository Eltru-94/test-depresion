<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Roles extends Seeder
{
    public function run()
    {
        $data = [
            ['rol' => 'ADMIN','estado'=>1,],
            ['rol' => 'PROFESIONAL','estado'=>1],

        ];
        foreach($data as $dt){
            $this->db->table('roles')->insert($dt);
        }
    }
}
