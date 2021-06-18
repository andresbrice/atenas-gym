<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarifa extends Model
{
    use HasFactory;

     protected $fillable = ['precio',];

  public function clase(){
    return $this->HasMany(Clase::class);
  }
}
