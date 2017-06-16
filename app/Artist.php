<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{
     protected $fillable = [
         'about','name', 'avatar','slug','user_id'
    ];
   
   public function path(){
     return "/artist/".$this->slug;
   }
    public function account(){
      return  $this->belongsTo(User::class);
    }
    
    public function tracks(){
      return $this->hasMany(Track::class);

    }
}
