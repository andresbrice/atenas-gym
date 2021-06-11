<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User;

class Profesor extends User
{
    use HasFactory;

    public function __construct($user){
      $this->user_id = $user->id;
    }

    public function usuario(){
      return $this->belongsTo(User::class,'user_id');
    }

    public function clases_profesors(){
      return $this->HasMany(Clase_Profesor::class);
    }
}
