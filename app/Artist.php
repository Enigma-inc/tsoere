<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{
     protected $fillable = [
         'about', 'avatar','slug','user_id'
    ];

    public function account(){
      return  $this->belongsTo(User::class);
    }
}
