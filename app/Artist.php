<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{
     protected $fillable = [
         'about','name', 'avatar','slug','user_id','artist_category_id'
    ];
    protected $appends=['category'];

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
}
