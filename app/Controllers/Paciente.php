<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Pacientes;

class Paciente extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Pacientes'
        ];
        return view('paciente/index', $data);
    }

    public function allData()
    {
        $modelPaciente=new Pacientes();
        $query=$modelPaciente->selectPacientes();
        return $this->getRespose([
            'pacientes' => $query
        ]);

    }

    public function store()
    {
        $validation = \Config\Services::validation();
        if (!$this->validate('paciente')) {
            $errors = $validation->getErrors();
            return $this->getRespose([
                'error' => $errors,
            ]);
        }
        $input = $this->getRequestInput($this->request);
        unset($input['id_paciente']);
        $input['estado'] = 1;
        $input['test'] = 0;

        $modelPaciente=new Pacientes();
        $modelPaciente->insert($input);
        return $this->getRespose([
            'success' => "Registrado"
        ]);


    }

    public function pacienteUpdate($id)
    {


        $modelPaciente = new Pacientes();
        $query = $modelPaciente->selectId($id);
        return $this->getRespose([
            'paciente' => $query,
        ]);
    }
    public function update()
    {
        $input = $this->getRequestInput($this->request);
        $validation = \Config\Services::validation();
        if (!$this->validate('paciente')) {
            $errors = $validation->getErrors();
            return $this->getRespose([
                'error' => $errors,
            ]);
        }
        $id_paciente= $input ['id_paciente'];
        unset($input['id_paciente']);
        $modelPaciente=new Pacientes();
        $modelPaciente->update($id_paciente,$input);

        return $this->getRespose([
            'success' => "Actualizado"
        ]);
    }


}
