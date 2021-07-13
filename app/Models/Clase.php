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
    return $this->belongsToMany(Profesor::class)->withTimestamps();
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
          $filtro = 'userName';
          return $query->where($filtro, "LIKE", "%$search%");
          break;
        case 1:
          $filtro = 'userName';
          return $query->where($filtro, "LIKE", "%$search%");
          break;
        case 1:
          $filtro = 'userName';
          return $query->where($filtro, "LIKE", "%$search%");
          break;
      }
    } elseif (trim($search) == "") {
      $filtro = "";
    }
  }
}
