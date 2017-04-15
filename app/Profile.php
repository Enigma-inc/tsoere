<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
     protected $fillable = [
         'about', 'avatar','slug','user_id'
    ];

    public function ower(){
      return  $this->belongsTo(User::class);
    }
}
