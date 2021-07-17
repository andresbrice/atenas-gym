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

  public function alumno_clase()
  {
    return $this->HasMany(Alumno_Clase::class);
  }

  public function profesors()
  {
    return $this->belongsToMany(Profesor::class)
      ->withTimestamps();
  }

  public function tarifa()
  {
    return $this->belongsTo(Tarifa::class);
  }

  public function dias()
  {
    return $this->belongsToMany(Dia::class)->withTimestamps();
  }

  public function horario()
  {
    return $this->belongsTo(Horario::class);
  }

  // QUERY SCOPES

  public function scopeSearch($query, $filtro, $search)
  {
    if (($filtro) && trim($search) && ($filtro != "")) {
      switch ($filtro) {
        case 1:
          $filtro = 'tipo_clase';
          return $query->where($filtro, "LIKE", "%$search%");
          break;
        case 2:
          $filtro = 'horario';
          return $query->where($filtro, "LIKE", "%$search%");
          break;
        case 3:
        //   $filtro = 'dias';
          return $query->where('dias.dia', "LIKE", "%$search%")->join('clases','dias.clase_id','=','dias.id');
          break;
        case 4:
          $filtro = 'alumnos';
          return $query->where($filtro, "LIKE", "%$search%");
          break;
        case 5:
          $filtro = 'profesor';
          return $query->where($filtro, "LIKE", "%$search%");
          break;
      }
    } elseif (trim($search) == "") {
      $filtro = "";
    }
  }
}
