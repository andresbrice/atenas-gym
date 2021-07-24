<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Rutina extends Model
{
  use HasFactory;

  protected $fillable = [
    'fecha_emision',
    'series',
    'repeticiones',
    'descanso',
    'alumno_clase_id',
    'profesor_id',
  ];

  public function alumno_clase()
  {
    return $this->belongsTo(Alumno_Clase::class);
  }

  public function ejercicios()
  {
    return $this->belongsToMany(Ejercicio::class);
  }

  // public function alumno(){
  //   $query = Rutina::
  // }

  public function profesor()
  {
    return $this->belongsTo(Profesor::class);
  }

  public function scopeSearch($query, $filtro, $search)
  {
    if (($filtro) && trim($search) && ($filtro != "")) {
      switch ($filtro) {
        case 1:
            return $query->whereHas('clases', function($query) use($search) {   
                return $query->where("clases.tipo_clase", "LIKE", "%$search%");
              });
          break;
        case 2:
          $filtro = 'fecha_emision';
          return $query->where($filtro, "LIKE", "%$search%");
          break;
        case 3:
            $query->whereHas('alumno_clase', function ($query) use ($search) {
                $query->whereHas('alumno', function ($query) use ($search) {
                    $query->whereHas('user', function ($query) use ($search) {
                        return $query->where(DB::raw("CONCAT(name,' ',lastName)"), "LIKE", "%$search%");
                    });
                });
                });
          break;
        case 4:
          $query->whereHas('profesor', function ($query) use ($search) {
            $query->whereHas('user', function ($query) use ($search) {
              return $query->where(DB::raw("CONCAT(name,' ',lastName)"), "LIKE", "%$search%");
            });
          });
          break;
      }
    } elseif (trim($search) == "") {
      $filtro = "";
    }
  }
}
