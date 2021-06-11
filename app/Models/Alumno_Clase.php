<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class Alumno_Clase extends Pivot
{
  protected $fillable =
  [
    'alumno_id',
    'clase_id'
  ];//VERIFICAR QUE TENGO QUE PONER LAS VARIABLES.

  public function alumno(){
    return $this->belongsTo(Alumno::class,'alumno_id');
  }

  public function clase(){
    return $this->belongsTo(Clase::class,'clase_id');
  }
  
  public function asistencias (){
    return $this->HasMany(Asistencia::class);
  }
  
  public function rutinas (){
    return $this->HasMany(Rutina::class);
  }
}
