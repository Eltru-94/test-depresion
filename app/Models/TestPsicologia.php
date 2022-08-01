<?php

namespace App\Models;

use CodeIgniter\Model;

class TestPsicologia extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'testpsicologia';
    protected $primaryKey       = 'id_test';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [];

    public function __construct()
    {
        parent::__construct();
        $db = \Config\Database::connect();
    }
    public function selectTest()
    {
        $builder = $this->db->table('testpsicologia');
        $builder->select('*');
        $builder->where('estado',1);
        $query = $builder->get();
        return $query->getResultArray();
    }

}
