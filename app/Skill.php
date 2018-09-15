<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    protected $fillable = ['date_recorded'];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
