<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User;

class Profesor extends User
{
    use HasFactory;
    
    protected $fillable = ['user_id'];

    public function usuario(){
      return $this->belongsTo(User::class,'user_id');
    }
}
