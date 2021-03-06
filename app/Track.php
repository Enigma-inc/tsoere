<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Scout\Searchable;
use DB;

class Track extends Model
{
    use SoftDeletes;
    use Searchable;

    protected $guarded=['id'];
    protected $hidden = [ 'artwork_path','audio_path','json_path'];    
    protected $appends=array('artwork','audio','json','path');
    protected $dates = ['deleted_at'];

    public function artist()
    {
        return $this->belongsTo(Artist::class);
    }

    public function actions(){
        return $this->belongsToMany(Action::class);
    }
    public function getPathAttribute(){
        return url("/artist/".$this->artist->slug."/single/".$this->slug);
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
    public function genre(){
        return $this->belongsTo(genre::class);
    }
}
