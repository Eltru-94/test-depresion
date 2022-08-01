<?php

namespace App\Models;

use CodeIgniter\Model;

class TestPacientes extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'testpacientes';
    protected $primaryKey       = 'id_testpaciente';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['detalle','puntuacion','id_user','id_paciente','estado'];

    public function __construct()
    {
        parent::__construct();
        $db = \Config\Database::connect();
    }

    public function selectTestDepresionRealizados()
    {
        $builder = $this->db->table('testpacientes');
        $builder->select(' testpacientes.puntuacion,
 testpacientes.detalle,
  CONCAT(pacientes.nombres, " ", pacientes.apellidos) AS paciente,
  testpacientes.id_testpaciente,
  CONCAT(users.nombre, " ", users.apellido) AS usuario,
  pacientes.cedula,
  pacientes.fecha_nacimiento,
  pacientes.sexo,
  pacientes.ciudad,
  pacientes.provincia');
        $builder->join('users', 'users.id_user = testpacientes.id_user');
        $builder->join('pacientes', 'pacientes.id_paciente = testpacientes.id_paciente');
        $query = $builder->get();
        return $query->getResultArray();
    }

    public function total_test(){

        $builder = $this->db->table('testpacientes');
        $builder->select('COUNT(estado) AS TOTAL');
        $query = $builder->get();
        return $query->getResultArray();
    }

    public function total_test_detalle(){

        $builder = $this->db->table('testpacientes');
        $builder->select('COUNT(estado) AS TOTAL,detalle');
        $builder->groupBy('detalle');
        $query = $builder->get();
        return $query->getResultArray();
    }

    public function updateTestpaciente($data, $id_testpaciente)
    {

        $builder= $this->db->table('testpacientes');
        $builder->where('id_testpaciente',$id_testpaciente);
        $query=$builder->update($data);
        return $query;

    }
}
