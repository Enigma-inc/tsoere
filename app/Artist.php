<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Artist extends Model
{
     protected $fillable = [
         'about','name', 'avatar','slug','user_id','artist_category_id'
    ];
    protected $appends=['category','thumbnail'];
    protected $hidden=['avatar_thumbnail'];

    public function account(){
      return  $this->belongsTo(User::class);
    }
    
    public function tracks(){
      return $this->hasMany(Track::class);

    }
    public function category(){
      return $this->belongsTo(ArtistCategory::class,'artist_category_id');
    }
    public function getCategoryAttribute(){
      return $this->category()->first()->name;
    }
    public function getThumbnailAttribute(){      
            return Storage::Url($this->avatar_thumbnail);        
    }
}
