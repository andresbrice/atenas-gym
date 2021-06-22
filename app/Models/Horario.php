<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Horario extends Model
{
  use HasFactory;
  protected $table = 'horarios';
  
  protected $fillable =['hora'];  

  protected $dates=['hora'];

  public function __construct(){
    //
  }

  public function clases(){
    return $this->hasMany(Clase::class);
  }
}
