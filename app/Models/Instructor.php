<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class Instructor extends Authenticatable implements JWTSubject
{
    use HasFactory;

    protected $table ='instructors';

    protected $fillable = [
        'name',
        'email',
        'password',
    ];


    protected $hidden = [

        'password',
        'remember_token',
    ];

   public function courses(){
       return $this->hasMany(Course::class);
   }

   public function threads(){
       return $this->hasMany(Threads::class);
   }


    protected $casts = [
        'email_verified_at' => 'datetime',
    ];





    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return[];
    }
}
