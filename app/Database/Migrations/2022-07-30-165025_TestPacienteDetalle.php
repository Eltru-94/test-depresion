<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TestPacienteDetalle extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_testpacientedetalle' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => false,
                'auto_increment' => true
            ],
            'contestacion' => [
                'type' => 'VARCHAR',
                'constraint' => 10
            ],
            'id_testpaciente' => [
                'type' => 'INT',
                'constraint' => 11
            ],
            'id_test' => [
                'type' => 'INT',
                'constraint' => 11
            ],
            'estado' => [
                'type' => 'INT',
                'constraint' => 2
            ],

            'created_at datetime default current_timestamp'
        ]);
        $this->forge->addForeignKey('id_testpaciente','testpacientes','id_testpaciente');
        $this->forge->addForeignKey('id_test','testpsicologia','id_test');
        $this->forge->addKey('id_testpacientedetalle', TRUE);
        $this->forge->createTable('testpacientedetalles');
    }

    public function down()
    {
        $this->forge->dropTable('testpacientedetalles');
    }
}
