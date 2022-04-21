<?php

namespace App\Service;


use Illuminate\Support\Facades\Storage;
use Nette\Utils\Random;

class ImageService
{


    public function uploadImage($image)
    {
        if (isset($image)) {
            $fileName = Random::generate(20) . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/uploads', $fileName);
            return $fileName;
        }

    }



    public function removeImage($post)
    {
        if ($post->preview_image != null) {
            Storage::delete('public/uploads/' . $post->preview_image);
        }
        if ($post->main_image != null) {
            Storage::delete('public/uploads/' . $post->preview_main);

        }
    }


}
