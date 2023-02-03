<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Themes extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function last_message(){
        return $this->hasOne(Topic_messages::class, 'theme_id', 'id')->latestOfMany();
    }
}
