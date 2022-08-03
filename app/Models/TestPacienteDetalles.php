<?php

namespace App\Models;

use CodeIgniter\Model;

class TestPacienteDetalles extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'testpacientedetalles';
    protected $primaryKey       = 'id_testpacientedetalle';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['contestacion','id_testpaciente','id_test','estado'];

    public function __construct()
    {
        parent::__construct();
        $db = \Config\Database::connect();
    }

    public function selectTestDepresionRealizadosDetail($id)
    {
        $builder = $this->db->table('testpacientedetalles');
        $builder->select('testpacientedetalles.contestacion,testpsicologia.test,CONCAT(users.nombre,users.apellido ) AS PROFESIONAL,testpacientes.detalle');
        $builder->join('testpsicologia', 'testpacientedetalles.id_test = testpsicologia.id_test');
        $builder->join('testpacientes', 'testpacientedetalles.id_testpaciente = testpacientes.id_testpaciente');
        $builder->join('users', 'testpacientes.id_user = users.id_user');
        $builder->where(' testpacientedetalles.id_testpaciente', $id);
        $query = $builder->get();
        return $query->getResultArray();


    }

    public function selectTestDepresionRealizadosData($id)
    {
        $builder = $this->db->table('testpacientedetalles');
        $builder->select('*');
        $builder->join('pacientes', 'pacientes.id_paciente = testpacientedetalles.id_testpaciente');
        $builder->where('testpacientedetalles.id_testpaciente', $id);
        $query = $builder->get();
        return $query->getResultArray();
    }


}
