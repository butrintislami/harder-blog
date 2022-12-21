<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Replies extends Model
{
    use HasFactory;

    protected $fillable = [
        'thread_id',
        'user_id',
        'comment',

    ];

    public function threads(){
        return $this->belongsTo(Threads::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
