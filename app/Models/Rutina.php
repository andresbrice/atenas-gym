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
          $query = DB::query()
          ->select('rutinas.id', 'clases.tipo_clase', 'rutinas.fecha_emision', DB::raw("CONCAT(users.name,' ',users.lastName) as alumno"))
          ->from('rutinas')
          ->join('alumno_clase', 'rutinas.alumno_clase_id', '=', 'alumno_clase.id')
          ->join('clases', 'alumno_clase.clase_id', '=', 'clases.id')
          ->join('alumnos', 'alumno_clase.alumno_id', '=', 'alumnos.id')
          ->join('users', 'alumnos.user_id', '=', 'users.id')
          ->where("clases.tipo_clase", "LIKE", "%$search%")
          ->groupBy('rutinas.id')
          ->get();
          dd($query);
          return ($query);
          break;
        case 2:
          $filtro = 'fecha_emision';
          return $query->where($filtro, "LIKE", "%$search%");
          break;
        case 3:
          $query = DB::query()
          ->select('rutinas.id', 'clases.tipo_clase', 'rutinas.fecha_emision', DB::raw("CONCAT(users.name,' ',users.lastName) as alumno"))
          ->from('rutinas')
          ->join('alumno_clase', 'rutinas.alumno_clase_id', '=', 'alumno_clase.id')
          ->join('clases', 'alumno_clase.clase_id', '=', 'clases.id')
          ->join('alumnos', 'alumno_clase.alumno_id', '=', 'alumnos.id')
          ->join('users', 'alumnos.user_id', '=', 'users.id')
          ->where(DB::raw("CONCAT(users.name, users.lastName)"), "LIKE", "%$search%")
          ->groupBy('rutinas.id')
          ->get();
          dd($query);
          return ($query);
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
