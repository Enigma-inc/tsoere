<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Laravel\Scout\Searchable;

class Artist extends Model
{
    use Searchable;

     protected $fillable = [
         'about','name', 'avatar','slug','user_id','genre_id'
    ];
    protected $appends=['thumbnail','track_count'];
    protected $hidden=['avatar_thumbnail'];

   
   public function path(){
     return "/artist/".$this->slug;
   }
    public function account(){
      return  $this->belongsTo(User::class);
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
    public function getTrackCountAttribute(){      
            return $this->tracks()->count();       
    }
}
