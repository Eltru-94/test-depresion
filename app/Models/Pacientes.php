<?php

namespace App\Models;

use CodeIgniter\Model;

class Pacientes extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'pacientes';
    protected $primaryKey       = 'id_paciente';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ["nombres","apellidos","cedula","fecha_nacimiento","provincia","ciudad","sexo","estado","test"];

    public function __construct()
    {
        parent::__construct();
        $db = \Config\Database::connect();
    }

    public function selectPacientes()
    {
        $builder = $this->db->table('pacientes');
        $builder->select('*');
        $builder->where('estado',1);
        $builder->where('test',0);
        $query = $builder->get();
        return $query->getResultArray();
    }

    public function selectPacientesDetalles()
    {
        $builder = $this->db->table('pacientes');
        $builder->select('*');
        $query = $builder->get();
        return $query->getResultArray();
    }

    public function selectId($id)
    {
        $builder = $this->db->table('pacientes');
        $builder->select('*');
        $builder->where('id_paciente', $id);
        $query = $builder->get();
        return $query->getResultArray();
    }

    public function total_pacientes(){

        $builder = $this->db->table('pacientes');
        $builder->select('COUNT(estado) AS TOTAL');
        $query = $builder->get();
        return $query->getResultArray();
    }



    }
