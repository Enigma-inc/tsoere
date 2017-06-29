<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    protected $quarded=['id'];
    protected $table="genres";
    protected $hidden=['created_at','updated_at'];

    public function tracks(){
        return $this->hasMany(Track::class);
    }
}
