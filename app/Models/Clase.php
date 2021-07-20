<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

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
          $filtro = 'hora';
          return $query->whereHas('horario', function($query) use($filtro, $search) {
            $query->where($filtro, "LIKE", "%$search%");
            });
          break;
        case 3:
          $filtro = 'dia';
          return $query->whereHas('dias', function($query) use($filtro, $search) {
            $query->where($filtro, "LIKE", "%$search%");
            });
          break;
        case 4:
          return $query->whereHas('alumno_clase', function($query) use($search){
            $query->whereHas('alumno', function($query) use($search) {
              $query->whereHas('user', function($query) use($search) {
                return $query->where(DB::raw("CONCAT(name,' ',lastName)"), "LIKE", "%$search%");
              });
            });  
          });
          break;
        case 5:
          return $query->whereHas('profesors', function($query) use($search) {
            $query->whereHas('user', function($query) use($search) {
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

          

          // $filtro = 'horarios.hora';
          // $s = $search;
          // dd($s);
          // $query = DB::query()
          //   ->select('clases.id', 'clases.tipo_clase', 'clases.cupos_disponibles', 'horarios.hora', DB::raw("GROUP_CONCAT(dias.dia SEPARATOR ', ') as dias"), 'tarifas.precio')
          //   ->from('clases')
          //   ->join('horarios', 'clases.horario_id', '=', 'horarios.id')
          //   ->join('clase_dia', 'clases.id', '=', 'clase_dia.clase_id')
          //   ->join('dias', 'clase_dia.dia_id', '=', 'dias.id')
          //   ->join('tarifas', 'clases.tarifa_id', '=', 'tarifa.id')
          //   ->whereIn('clases.horario_id', function ($subQuery) {
          //     $subQuery->select('clases.horario_id')
          //       ->from('clases')
          //       ->join('horarios', 'clases.horario_id', '=', 'horarios.id')
          //       ->where($filtro, "LIKE", "%$search%");
          //   })
          //   ->groupby('clases.id')
          //   ->get();

          //   return $query;