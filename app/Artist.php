<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Artist extends Model
{
     protected $fillable = [
         'about','name', 'avatar','slug','user_id','genre_id'
    ];
    protected $appends=['thumbnail'];
    protected $hidden=['avatar_thumbnail'];

   
   public function path(){
     return "/artist/".$this->slug;
   }
    public function account(){
      return  $this->belongsTo(User::class,'user_id');
    }
    
    public function tracks(){
      return $this->hasMany(Track::class);

    }
    public function category(){
      return $this->belongsTo(Genre::class,'genre_id');
    }
    public function getThumbnailAttribute(){      
            return Storage::Url($this->avatar_thumbnail);        
    }
}
