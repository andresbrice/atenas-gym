<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ejercicio extends Model
{
  use HasFactory;

  protected $fillable = [
    'rutina_id'
  ];

  public function rutinas()
  {
    return $this->belongsToMany(Rutina::class);
  }
}
