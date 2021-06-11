<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Alumno extends User
{
    use HasFactory;


    protected $fillable = ['user_id'];

    public function __construct($user){
      $this->user_id = $user->id;
    }

    public function usuario(){
      return $this->belongsTo(User::class,'user_id');
    }

    public function alumnos_clases(){
      return $this->HasMany(Alumno_Clase::class);
    }
}
