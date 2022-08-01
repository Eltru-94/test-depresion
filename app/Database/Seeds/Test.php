<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Test extends Seeder
{
    public function run()
    {
      
        $this->call('Roles');
        $this->call('User');
        $this->call('Testpsicologia');

    }
}
