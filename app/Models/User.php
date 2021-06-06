<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
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
        'sex',
        'phone',
        'emergency_number',
        'role_id',
        'eRespiratorias',
        'eCardiacas',
        'eRenal',
        'epilepsia',
        'convulsiones',
        'diabetes',
        'asma',
        'alergia',
        'medicacion',
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

    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }

    // QUERY SCOPES
    public function scopeUserName($query,$userName){
      if ($userName) {
        return $query->where('userName',"LIKE","%$userName%");
      } 
    }

    public function scopeName($query,$name){
      if ($name) {
        return $query->where('name',"LIKE","%$name%");
      }
    }

    public function scopeLastName($query,$lastName){
      if ($lastName) {
        return $query->where('lastName',"LIKE","%$lastName%");
      } 
    }
}
