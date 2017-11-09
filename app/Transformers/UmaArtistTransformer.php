<?php
namespace App\Transformers;

use  Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class UmaArtistTransformer extends \Themsaid\Transformers\AbstractTransformer
{
    public function transformModel(Model $item)
    {
        $output = [
            'id'	        => $item->id,
            'artistName'	=> $item->name,
            'songTitle'		=> $item->song_title,
            'artistCode'	=> $item->code,
            'smsCode'		=> $item->sms_code,
            'videoCode'		=> $item->video_code,
            'song'		    => Storage::Url($item->mp3),
            'artwork'	    => Storage::Url($item->artwork),
            'slug'          =>$item->slug,
            'category'      =>$item->category->name
        ];
        
        if ($this->isRelationshipLoaded($item, 'category')) {
            $output['category'] = UmaCategoryTransformer::transform($item->category);
        }

        return $output;
    }

}
