<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UmaCategory extends Model
{
    protected $table="uma_categories";
    protected $guarded=['id'];

    public function artists()
    {
        return $this->hasMany(UmaArtist::class,'category_id');
    }
}
