<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Testpsicologia extends Seeder
{
    public function run()
    {
        $data = [
            ['test' => '¿Está básicamente satisfecho con su vida?','opcion_1'=>'SI','opcion_2'=>'NO','respuesta'=>'NO','puntuacion'=>1,'estado'=>1],
            ['test' => '¿Ha renunciado a muchas de sus actividades y pasatiempos?','opcion_1'=>'SI','opcion_2'=>'NO','respuesta'=>'SI','puntuacion'=>1,'estado'=>1],
            ['test' => '¿Siente que su vida está vacía?','opcion_1'=>'SI','opcion_2'=>'NO','respuesta'=>'SI','puntuacion'=>1,'estado'=>1],
            ['test' => '¿Se encuentra a menudo aburrido?','opcion_1'=>'SI','opcion_2'=>'NO','respuesta'=>'SI','puntuacion'=>1,'estado'=>1],
            ['test' => '¿Se encuentra alegre y optimista, con buen ánimo casi todo el tiempo?','opcion_1'=>'SI','opcion_2'=>'NO','respuesta'=>'NO','puntuacion'=>1,'estado'=>1],
            ['test' => '¿Teme que le vaya a pasar algo malo?','opcion_1'=>'SI','opcion_2'=>'NO','respuesta'=>'SI','puntuacion'=>1,'estado'=>1],
            ['test' => '¿Se siente feliz, contento la mayor parte del tiempo?','opcion_1'=>'SI','opcion_2'=>'NO','respuesta'=>'NO','puntuacion'=>1,'estado'=>1],
            ['test' => '¿Se siente a menudo desamparado, desvalido, indeciso?','opcion_1'=>'SI','opcion_2'=>'NO','respuesta'=>'SI','puntuacion'=>1,'estado'=>1],
            ['test' => '¿Prefiere quedarse en casa que acaso salir y hacer cosas nuevas?','opcion_1'=>'SI','opcion_2'=>'NO','respuesta'=>'SI','puntuacion'=>1,'estado'=>1],
            ['test' => '¿Le da la impresión de que tiene más fallos de memoria que los demás?','opcion_1'=>'SI','opcion_2'=>'NO','respuesta'=>'SI','puntuacion'=>1,'estado'=>1],
            ['test' => '¿Cree que es agradable estar vivo?','opcion_1'=>'SI','opcion_2'=>'NO','respuesta'=>'NO','puntuacion'=>1,'estado'=>1],
            ['test' => '¿Se le hace duro empezar nuevos proyectos?','opcion_1'=>'SI','opcion_2'=>'NO','respuesta'=>'SI','puntuacion'=>1,'estado'=>1],
            ['test' => '¿Se siente lleno de energía?','opcion_1'=>'SI','opcion_2'=>'NO','respuesta'=>'NO','puntuacion'=>1,'estado'=>1],
            ['test' => '¿Siente que su situación es angustiosa, desesperada?','opcion_1'=>'SI','opcion_2'=>'NO','respuesta'=>'SI','puntuacion'=>1,'estado'=>1],
            ['test' => '¿Cree que la mayoría de la gente vive económicamente mejor que usted?','opcion_1'=>'SI','opcion_2'=>'NO','respuesta'=>'SI','puntuacion'=>1,'estado'=>1],
            ];
        foreach($data as $dt){
            $this->db->table('testpsicologia')->insert($dt);
        }
    }
}
