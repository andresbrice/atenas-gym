<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class Clase_Profesor extends Pivot
{
    protected $fillable =
  [
    'profesor_id',
    'clase_id'
  ]; //VERIFICAR QUE TENGO QUE PONER LAS VARIABLES.

  public function profesor(){
    return $this->belongsTo(Profesor::class,'profesor_id');
  }
  
  public function clase(){
    return $this->belongsTo(Clase::class,'clase_id');
  }

}
