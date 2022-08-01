<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Pacientes extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_paciente' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => false,
                'auto_increment' => true
            ],
            'nombres' => [
                'type' => 'VARCHAR',
                'constraint' => 50
            ],
            'apellidos' => [
                'type' => 'VARCHAR',
                'constraint' => 50
            ],
            'cedula' => [
                'type' => 'VARCHAR',
                'constraint' => 15,
                'null'=>true
            ],
            'fecha_nacimiento' => [
                'type' => 'DATE',
                'null'=>true
            ],
            'provincia' => [
                'type' => 'VARCHAR',
                'constraint' => 50
            ],
            'ciudad'=>[
                'type' => 'VARCHAR',
                'constraint'=>50
            ],
            'sexo' => [
                'type' => 'VARCHAR',
                'constraint' => 11,
            ],
            'test' => [
                'type' => 'INT',
                'constraint' => 2
            ],
            'estado' => [
                'type' => 'INT',
                'constraint' => 2
            ],
            'created_at datetime default current_timestamp'
        ]);

        $this->forge->addKey('id_paciente', TRUE);
        $this->forge->createTable('pacientes');
    }

    public function down()
    {
        $this->forge->dropTable('pacientes');
    }
}
