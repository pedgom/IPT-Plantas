<?php

namespace App\Helpers;

use Spatie\MediaLibrary\MediaCollections\Models\Media;

class HelperMethods
{
    /**
     * Return true if is an image
     * Can be called like this \App\Facades\HelperMethods::isImage($user->getFirstMedia('avatar'))
     * @param Media $media
     * @return bool
     */
    public static function isImage(Media $media){
        return str_contains($media->mime_type , 'image');
    }
}
