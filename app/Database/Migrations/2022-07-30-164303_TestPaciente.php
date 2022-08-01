<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TestPaciente extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_testpaciente' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => false,
                'auto_increment' => true
            ],
            'detalle' => [
                'type' => 'VARCHAR',
                'constraint' => 50
            ],
            'puntuacion' => [
                'type' => 'INT',
                'constraint' => 11
            ],
            'id_user' => [
                'type' => 'INT',
                'constraint' => 11
            ],
            'id_paciente' => [
                'type' => 'INT',
                'constraint' => 11
            ],
            'estado' => [
                'type' => 'INT',
                'constraint' => 2
            ],

            'created_at datetime default current_timestamp'
        ]);
        $this->forge->addForeignKey('id_user','users','id_user');
        $this->forge->addForeignKey('id_paciente','pacientes','id_paciente');
        $this->forge->addKey('id_testpaciente', TRUE);
        $this->forge->createTable('testpacientes');
    }

    public function down()
    {
        $this->forge->dropTable('testpacientes');
    }
}
