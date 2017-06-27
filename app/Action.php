<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Action extends Model
{
    //
    protected $fillable=['name'];

    public function tracks(){
        return $this->belongsToMany(Track::class);
    }
}
