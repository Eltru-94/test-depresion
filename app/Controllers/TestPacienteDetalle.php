<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Pacientes;
use App\Models\TestPacienteDetalles;
use App\Models\TestPacientes;
use App\Models\Users;

class TestPacienteDetalle extends BaseController
{
    public function index($id)
    {
        /*$modelTestPacienteDetalle=new TestPacienteDetalles();
        $query=$modelTestPacienteDetalle->selectTestDepresionRealizadosDetail($id);
        $query1=$modelTestPacienteDetalle->selectTestDepresionRealizadosData($id);
        $datos = [
            'title' => 'Detalles test paciente :  '.$query1[0]['paciente'],
            'testRealizado'=>$query
        ];*/
        $modelTestPacienteDetalle=new TestPacienteDetalles();
        $query=$modelTestPacienteDetalle->selectTestDepresionRealizadosDetail($id);
        $query1=$modelTestPacienteDetalle->selectTestDepresionRealizadosData($id);
        $datos = [
            'title' => 'Detalles Test de Escala abreviada de depresión geriátrica de Yesavage',
            'testRealizado'=>$query,
            'paciente'=>$query1[0]
        ];

        $dompdf = new \Dompdf\Dompdf();
        $dompdf->loadHtml(view('testdepresion/testdepresiondetalle/index', $datos));
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();
        $dompdf->stream("archivo_.pdf".$query1[0]['nombres']."", array("Attachment" => 1));
        return view('testdepresion/testdepresiondetalle/index', $datos);
    }
    public function reportes()
    {
        $modelUser=new Users();
        $modelPacientes=new Pacientes();
        $modelPacienteTest=new TestPacientes();
        $query_total_users=$modelUser->total_users();
        $query_total_pacientes=$modelPacientes->total_pacientes();
        $query_total_testpacientes=$modelPacienteTest->total_test();

        return $this->getRespose([
            'total_users' => $query_total_users,
            'total_pacientes'=>$query_total_pacientes,
            'total_test_pacientes'=>$query_total_testpacientes

        ]);
    }
    public function  total_test_detalle(){
        $modelPacienteTest=new TestPacientes();
        $query=$modelPacienteTest->total_test_detalle();
        return $this->getRespose([
            'total_test' => $query,

        ]);

    }


}
