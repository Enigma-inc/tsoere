<?php

namespace App\Transformers;

use League\Fractal;
use League\Fractal\TransformerAbstract;
use League\Fractal\Resource\Collection;
use League\Fractal\Resource\Item;


class TrackJsonTransformer extends TransformerAbstract
{
    /**
     * List of resources possible to include
     *
     * @var array
     */
    protected $availableIncludes = [];

    /**
     * List of resources to automatically include
     *
     * @var array
     */
    protected $defaultIncludes = [];

    /**
     * Transform object into a generic array
     *
     * @var $resource
     * @return array
     */
    public function transform( $trackDetails)
    {
        return [

            'albumCover' => $trackDetails['artwork'],
            'albumTitle' => $trackDetails['title'],
			'albumAuthor' =>"",
            'autoPlay' => true,
            'shuffle' => false,  
			'entries' =>   array(
                             (object)array("title"=>$trackDetails['title'],"author"=>"","media" =>$trackDetails['mp3FilePath'], "link"=>"","color" =>"" )),
            ];
    }
}
