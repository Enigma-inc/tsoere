<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArtistCategory extends Model
{
    protected $guarded=['id'];
    
    public function categories(){
        return $this->hasMany(Artist::class);
    }
}
