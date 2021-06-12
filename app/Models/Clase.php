<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clase extends Model
{
  use HasFactory;

  protected $fillable =
  [
    'tipo_clase',
    'cupos_disponibles',
  ];

  public function alumnos_clases()
  {
    return $this->HasMany(Alumno_Clase::class);
  }

  public function profesors()
  {
    return $this->belongsToMany(Profesor::class);
  }

  
  public function tarifa(){
    return $this->belongsTo(Tarifa::class);
  }

  public function clases_diaSemanas(){
    return $this->belongsToMany(DiaSemana::class);
  }

  public function horario(){
    return $this->hasOne(Horario::class);
  }





}
