<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Threads extends Model
{
    use HasFactory;

    protected $fillable = [
        'instructor_id',
        'title',
        'description',
    ];

    public function instructor(){
        return $this->hasOne(Instructor::class);
    }

    public function replies(){
        return $this->hasMany(Replies::class);
    }

}
