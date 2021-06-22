<?php

namespace Database\Seeders;

use App\Models\Tarifa;
use Illuminate\Database\Seeder;

class TarifaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $uno = new Tarifa();
      $uno->precio = 500;
      $uno->save();

      $dos = new Tarifa();
      $dos->precio = 900;
      $dos->save();

      $tres = new Tarifa();
      $tres->precio = 1200;
      $tres->save();

      $cuatro = new Tarifa();
      $cuatro->precio = 1500;
      $cuatro->save();

      $cinco = new Tarifa();
      $cinco->precio = 2000;
      $cinco->save();
    }
}
