<?php
namespace App\Http\Traits;

use Intervention\Image\Facades\Image;
use Symfony\Component\HttpFoundation\File\UploadedFile;


trait TrackTrait {
  private function resizeArtwork(UploadedFile $artwork,$artworkPath){

     //Resize Image
     $avatarStream= Image::make($artwork)
              ->fit(300, 300)
              ->stream()
              ->detach();

              //Push Files to Storage
     $this->disk->put($artworkPath,$avatarStream,'public');
  }
}
