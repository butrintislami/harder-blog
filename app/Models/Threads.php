<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Threads extends Model
{
    use HasFactory;

    protected $fillable = [
        'instructor_id',
        'course_id',
        'thread',
        'information',
    ];

    public function instructor(){
        return $this->belongsTo(Instructor::class);
    }

    public function course(){
        return $this->belongsTo(Course::class);
    }

    public function replies(){
        return $this->hasMany(Replies::class);
    }

}
