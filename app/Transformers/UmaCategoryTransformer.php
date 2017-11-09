<?php
namespace App\Transformers;

use  Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class UmaCategoryTransformer extends \Themsaid\Transformers\AbstractTransformer
{
    public function transformModel(Model $item)
    {
        $output = [
            'name'	=> $item->name,
            'code'	=> $item->code
        ];
         if ($this->isRelationshipLoaded($item, 'artists')) {
            $output['artists'] = UmaArtistTransformer::transform($item->artists);
        }

        return $output;
    }

}
