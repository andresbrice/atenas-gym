<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clase extends Model
{
  use HasFactory;

  protected $fillable =
  [
    'alumno_id',
    'profesor_id',
    'dia_semana_id',
    'tarifa_id',
    'tipo_clase',
    'cupos_disponibles',
  ];

  public function alumnos_clases()
  {
    return $this->HasMany(Alumno_Clase::class);
  }
  public function clases_profesors()
  {
    return $this->HasMany(Clase_Profesor::class);
  }

  // public function tarifas(){
  //   return $this->HasMany(Tarifa::class);
  // }

  // public function clases_diaSemanas(){
  //   return $this->belongsToMany(DiaSemana::class);
  // }

  // public function horario(){
  //   return $this->hasOne(Horario::class);
  // }





}
