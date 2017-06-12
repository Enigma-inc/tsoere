<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    //
     public function account(){
      return  $this->belongsTo(User::class);
    }
}
