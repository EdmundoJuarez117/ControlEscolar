<?php

namespace Database\Seeders;
use App\Models\C_carrera;
use Illuminate\Database\Seeder;

class carrerasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      //Carreras
      $carrera = new C_carrera();
      $carrera->nombre = "Ingeniería en Software";
      $carrera->nombre_corto = "ISW";
      $carrera->estatus = "1";
      $carrera->idmodalidad = "1";
      $carrera->save();

      $carrera = new C_carrera();
      $carrera->nombre = "Licenciatura en Terapia Física";
      $carrera->nombre_corto = "LTF";
      $carrera->estatus = "1";
      $carrera->idmodalidad = "1";
      $carrera->save();
    }
}
