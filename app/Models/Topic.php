<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function last_message(){
        return $this->hasOne(Topic_messages::class,'topic_id', 'id')->latestOfMany();
    }

    public function theme_name(){
        return $this->hasOne(Themes::class,'id', 'theme_id');
    }
}
