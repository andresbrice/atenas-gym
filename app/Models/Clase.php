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
    'horario_id',
    'tarifa_id'
  ];

  public function alumnos_clases()
  {
    return $this->HasMany(Alumno_Clase::class);
  }

  public function profesors()
  {
    return $this->belongsToMany(Profesor::class)->as('clase_profesor');
  }
  
  public function tarifa(){
    return $this->belongsTo(Tarifa::class);
  }

  public function dias(){
    return $this->belongsToMany(Dia::class)->as('clase_dia');
  }

  public function horario(){
    return $this->belongsTo(Horario::class);
  }
}
