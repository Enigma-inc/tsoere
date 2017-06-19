<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class genre extends Model
{
    protected $quarded=['id'];
    protected $table="genres";

    public function tracks(){
        return $this->hasMany(Track::class);
    }
}
