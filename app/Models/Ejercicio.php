<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Ejercicio extends Model
{
  use HasFactory;

  protected $fillable = [

    'nombre_ejercicio',
    'descripcion',
  ];



  public function rutinas()
  {
    return $this->belongsToMany(Rutina::class);
  }

  public function clases()
  {
    return $this->belongsToMany(Clase::class);
  }


  public function scopeSearch($query, $filtro, $search)
  {
    if (($filtro) && trim($search) && ($filtro != "")) {
      switch ($filtro) {
        case 1:
          $filtro = 'nombre_ejercicio';
          return $query->where($filtro, "LIKE", "%$search%");
          break;

        case 2:
          $filtro = 'descripcion';
          return $query->where($filtro, "LIKE", "%$search%");
          break;
        case 3:
          $query->whereHas('rutinas', function($query) use($search){
            $query->whereHas('alumno_clase', function($query) use($search){
              $query->whereHas('clase', function($query) use($search){
                return $query->where(DB::raw("tipo_clase", "LIKE", "%$search%"));
              });
            });
          });
          break;
      }
    } elseif (trim($search) == "") {
      $filtro = "";
    }
  }
}
