<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TestPsicologia extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_test' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => false,
                'auto_increment' => true
            ],
            'test' => [
                'type' => 'VARCHAR',
                'constraint' => 200
            ],
            'opcion_1' => [
                'type' => 'VARCHAR',
                'constraint' => 10
            ],
            'opcion_2' => [
                'type' => 'VARCHAR',
                'constraint' => 10
            ],
            'respuesta' => [
                'type' => 'VARCHAR',
                'constraint' => 10
            ],
            'puntuacion' => [
                'type' => 'INT',
                'constraint' => 3
            ],
            'estado' => [
                'type' => 'INT',
                'constraint' => 2
            ],

            'created_at datetime default current_timestamp'
        ]);
        $this->forge->addKey('id_test', TRUE);
        $this->forge->createTable('testpsicologia');
    }

    public function down()
    {
        $this->forge->dropTable('testpsicologia');
    }
}
