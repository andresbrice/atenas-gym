<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
      }
    } elseif (trim($search) == "") {
      $filtro = "";
    }
  }
}

