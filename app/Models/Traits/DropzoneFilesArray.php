<?php

namespace App\Models\Traits;

use Illuminate\Support\Facades\DB;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

trait DropzoneFilesArray
{
    /**
     * Return an array with the challenge pdf file information
     * @return array
     */
    /**
     * Receive the name os the media collection and return an array with file information to be used on dropzpne to pre-
     * populate the input on edit
     * @param $collection
     * @return array
     */
    public function getFilesArray($collection){
        $files = [];
        foreach($this->getMedia($collection) as $file){
            $files[] =[
                'id' => $file->id,
                'name' => $file->name,
                'dataURL' => $file->getUrl(),
                'imageUrl' => $file->getTypeFromMime() == 'image' ? $file->getUrl() : assetCustom('media/custom/generic-file.png'),
                'size' => $file->size,
                'type' => $file->mime_type, // mime_type
                'accepted' => true // to count the maxFiles on dropzone
            ];
        }
        return $files;
    }


}
