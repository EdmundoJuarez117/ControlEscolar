<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\C_modalidad;

class modalidades extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      //Modalidades
      $modalidad = new C_modalidad();
      $modalidad->nombre = "ESCOLARIZADA";
      $modalidad->save();

      $modalidad = new C_modalidad();
      $modalidad->nombre = "MIXTA";
      $modalidad->save();

    }
}
