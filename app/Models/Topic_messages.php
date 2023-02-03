<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Topic_messages extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function user(){
        return $this->hasOne(User::class, 'id','user_id');
    }

    public function topic(){
        return $this->hasOne(Topic::class, 'id', 'topic_id');
    }
}
