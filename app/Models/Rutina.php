<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rutina extends Model
{
  use HasFactory;

  protected $fillable = [
    'fecha_emision',
    'series',
    'repeticiones',
    'descanso',
    'alumno_clase_id',
  ];

  public function alumnos_clases()
  {
    return $this->belongsTo(Alumno_Clase::class, 'alumnos_clases_id');
  }

  public function ejercicios()
  {
    return $this->belongsToMany(Ejercicio::class);
  }
}
