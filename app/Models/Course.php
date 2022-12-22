<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;


    protected $fillable = [
        'instructor_id',
        'title',
        'description',
    ];

    public function instructor(){
        return $this->belongsTo(Instructor::class);
        }

   public function users(){
        return $this->belongsToMany(User::class,'course_user');
   }

   public function threads(){
        return $this->hasMany(Threads::class);
   }




}
