<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dias_Semana extends Model
{
    use HasFactory;
    protected $table='dias_semana';
    protected $fillable =[
      'dia',
    ];

    public function clases(){
      return $this->belongsToMany(Clase::class);
    }
}
