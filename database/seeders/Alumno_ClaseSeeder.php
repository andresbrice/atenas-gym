<?php

namespace Database\Seeders;

use App\Models\Alumno_Clase;
use Illuminate\Database\Seeder;

class Alumno_ClaseSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    Alumno_Clase::factory()->times(4)->create();
  }
}
