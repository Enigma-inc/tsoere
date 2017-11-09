<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UmaArtist extends Model
{
    protected $table='uma_artists';
    protected $guarded=['id'];

    public function category()
    {
        return $this->belongsTo(UmaCategory::class,'category_id');
    }
}
