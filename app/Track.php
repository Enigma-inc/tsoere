<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Track extends Model
{
    protected $guarded=['id'];
    protected $hidden = [ 'artwork_path','audio_path','json_path'];    
    protected $appends=array('artwork','audio','json');

    public function owner()
    {
        return $this->belongsTo(Artist::class);
    }

    public function getArtworkAttribute(){
        return Storage::Url($this->artwork_path);
    }
    public function getAudioAttribute(){
        return Storage::Url($this->audio_path);
    }
    public function getJsonAttribute(){
        return Storage::Url($this->json_path);
    }
}
