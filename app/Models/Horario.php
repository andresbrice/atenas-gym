<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Horario extends Model
{
    use HasFactory;

    protected $fillable =['hora'];

    public function __construct(){
      //
    }

    public function horario(){
      return $this->hasOne(Clase::class);
    }
}
