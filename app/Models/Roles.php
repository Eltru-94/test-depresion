<?php

namespace App\Models;

use CodeIgniter\Model;

class Roles extends Model
{
    protected $table            = 'roles';
    protected $primaryKey       = 'id';
    protected $allowedFields    = [];


    public function __construct()
    {
        parent::__construct();
        $db = \Config\Database::connect();
    }


    public function selectRoles()
    {
        $builder = $this->db->table('roles');
        $query = $builder->get();
        return $query->getResultArray();
    }

 
}
