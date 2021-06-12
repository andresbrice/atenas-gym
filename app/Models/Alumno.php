<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\User;

class Alumno extends User
{
    use HasFactory;

    public function __construct($user){
      $this->user_id = $user->id;
    }

    public function usuario(){
      return $this->belongsTo(User::class);
    }

    public function alumnos_clases(){
      return $this->HasMany(Alumno_Clase::class);
    }
}
