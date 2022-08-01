<?php

namespace App\Models;

use CodeIgniter\Model;

class Users extends Model
{
    protected $table = 'users';
    protected $primarykey = 'id_user';
    protected $allowedFields = ['nombre', 'apellido', 'cedula', 'correo', 'telefono', 'clave', 'estado', 'id_rol'];

    public function __construct()
    {
        parent::__construct();
        $db = \Config\Database::connect();
    }

    public function selectEmail($email)
    {
        $builder = $this->db->table('users');
        $builder->select('  roles.id_rol,roles.rol,users.nombre,users.id_user,users.apellido,users.cedula,users.correo,users.telefono, users.id_rol,users.clave,users.estado, users.created_at');
        $builder->join('roles', 'users.id_rol = roles.id_rol');
        $builder->where('users.correo', $email);
        $query = $builder->get();
        return $query->getResultArray();
    }

    public function selectId($id)
    {
        $builder = $this->db->table('users');
        $builder->select('*');
        $builder->where('users.id_user', $id);
        $query = $builder->get();
        return $query->getResultArray();
    }


    public function selectUser()
    {
        $builder = $this->db->table('users');
        $query = $builder->get();
        return $query->getResultArray();
    }


    public function updateUser($data, $id_user)
    {

        $builder= $this->db->table('users');
        $builder->where('id_user',$id_user);
        $query=$builder->update($data);
        return $query;

    }


    public function total_users(){

        $builder = $this->db->table('users');
        $builder->select('COUNT(users.estado) AS TOTAL');
        $query = $builder->get();
        return $query->getResultArray();
    }
}
