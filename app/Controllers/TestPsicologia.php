<?php

namespace App\Controllers;

use App\Models\Pacientes;

use App\Models\TestPacienteDetalles;
use App\Models\TestPacientes;
use CodeIgniter\Controller;

class TestPsicologia extends BaseController
{
    public function index($id)
    {
        $modelTestPsicologia=new \App\Models\TestPsicologia();
        $modelPaciente=new Pacientes();
        $queryPaciente=$modelPaciente->selectId($id);
        $query=$modelTestPsicologia->selectTest();
        //session()->get('loggedUser')
        $datos = [
            'title' => 'Test Psicología Paciente : '.$queryPaciente[0]['nombres'].' '.$queryPaciente[0]['apellidos'],
            'id_paciente'=>$id,
            'test'=>$query
        ];
        return view('testpsicologia/index', $datos);
    }

    public function store()
    {

        $validation = \Config\Services::validation();
        if (!$this->validate('testpsicologico')) {
            $errors = $validation->getErrors();
            return $this->getRespose([
                'error' => $errors,
            ]);
        }
        $id_user=session()->get('loggedUser');
        $puntaje=0;
        $mensaje="";
        $input = $this->getRequestInput($this->request);
        $id_paciente= $input['id_paciente'];

        $modelTestPsicologia=new \App\Models\TestPsicologia();
        $query=$modelTestPsicologia->selectTest();

        $tem_testpaciente=[
            'puntuacion'=>0,
            'id_user'=>$id_user,
            'id_paciente'=>$id_paciente,
            'estado'=>1
        ];
        $tem_paciente=[
            'test'=>1
        ];

        $modelTestpaciente=new TestPacientes();
        $modelTestpacientedetalle=new TestPacienteDetalles();
        $modelPaciente=new Pacientes();
        $id_testpaciente=$modelTestpaciente->insert($tem_testpaciente);


        foreach ($query as $item){
            $pregunta="pregunta_".$item['id_test'];
            $auxpregunta=$input[$pregunta];
           if($auxpregunta==$item['respuesta']){
                $puntaje=$puntaje+1;
           }

           $tem_testpacientedetalle=[
               'contestacion'=>$auxpregunta,
               'id_testpaciente'=>$id_testpaciente,
               'id_test'=>$item['id_test'],
               'estado'=>1
           ];

        $modelTestpacientedetalle->insert($tem_testpacientedetalle);
        }
        if($puntaje>=-1 && $puntaje<=5){
            $mensaje="NORMAL";
        }else if($puntaje>=6 && $puntaje<=9){
            $mensaje="DEPRESIÓN LEVE";
        }else{
            $mensaje="DEPRESIÓN ESTABLECIDA";
        }
        $tem_testpacienteupdate=[
            'puntuacion'=>$puntaje,
            'detalle'=>$mensaje,

        ];
        $modelTestpaciente->update($id_testpaciente,$tem_testpacienteupdate);

        $modelPaciente->update($id_paciente,$tem_paciente);

        return $this->getRespose([
            'success' => "Test abreviado de depresión"
        ]);
    }

    public function testdepresion()
    {

        $datos = [
            'title' => 'Test abreviado de depresión realizados'
        ];
        return view('testdepresion/index', $datos);
    }

    public function selectTestDepresionRealizados()
    {
        $modelTestPaciente=new TestPacientes();
        $query=$modelTestPaciente->selectTestDepresionRealizados();
        return $this->getRespose([
            'testrealizados' => $query,
        ]);
    }

    public function selecttest()
    {
        $modelTestPsicologia=new \App\Models\TestPsicologia();
        $query=$modelTestPsicologia->selectTest();
        return $this->getRespose([
            'test' => $query,
        ]);

    }

    public function test()
    {

        $datos = [
            'title' => 'Test abreviado de depresión'
        ];
        return view('testdepresion/test/index', $datos);
    }



}
