<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
  use HasFactory, Notifiable;

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'name',
    'email',
    'userName',
    'dni',
    'lastName',
    'age',
    'gender',
    'phone',
    'emergency_number',
    'eRespiratorias',
    'eCardiacas',
    'eRenal',
    'epilepsia',
    'convulsiones',
    'diabetes',
    'asma',
    'alergia',
    'medicacion',
    'role_id',
  ];

  /**
   * The attributes that should be hidden for arrays.
   *
   * @var array
   */
  protected $hidden = [
    'password',
    'remember_token',
  ];

  /**
   * The attributes that should be cast to native types.
   *
   * @var array
   */
  protected $casts = [
    'email_verified_at' => 'datetime',
  ];

  //RELACION CON MODELO ROL
  public function role()
  {
    return $this->belongsTo(Role::class);
  }

  //RELACION CON MODELO ALUMNO
  public function alumno()
  {
    return $this->hasOne(Alumno::class);
  }

  //RELACION CON MODELO PROFESOR
  public function profesor()
  {
    return $this->hasOne(Profesor::class);
  }

  // QUERY SCOPES

  public function scopeSearch($query, $filtro, $search)
  {
    if (($filtro) && trim($search) && ($filtro != "")) {
      if ($filtro === "name") {
        return $query->where(DB::raw("CONCAT(name,' ',lastName)"), "LIKE", "%$search%");
      } else {
        return $query->where($filtro, "LIKE", "%$search%");
      }
    }
  }

   
  // public function scopeUserName($query, $userName)
  // {
  //   if ($userName) {
  //     return $query->where('userName', "LIKE", "%$userName%");
  //   }
  // }

  // public function scopeName($query, $name)
  // {
  //   if ($name) {
  //     return $query->where('name', "LIKE", "%$name%");
  //   }
  // }

  // public function scopeLastName($query, $lastName)
  // {
  //   if ($lastName) {
  //     return $query->where('lastName', "LIKE", "%$lastName%");
  //   }
  // }

  /*if($filtro === 'name'){ 
        return $query->where(DB::raw("CONCAT(name,' ',lastName)"),"LIKE", "%$search%");
      }else{*/
}
