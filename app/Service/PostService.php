<?php

namespace App\Service;

use App\Models\Post;
use Nette\Utils\Random;

class PostService
{

    public function store($data)
    {

        if (isset($data['preview_image'])) {
            $data['preview_image'] = $this->uploadImage($data['preview_image']);
        }
        if (isset($data['main_image'])) {
            $data['main_image'] = $this->uploadImage($data['main_image']);
        }
        $tagIds = $this->setTags($data);
        unset($data['tag_ids']);

        $post = Post::firstOrCreate($data);
        $post->tags()->attach($tagIds);


    }


    public function update($data, $post)
    {
        if (isset($data['preview_image'])) {
            $data['preview_image'] = $this->uploadImage($data['preview_image']);
        }
        if (isset($data['main_image'])) {
            $data['main_image'] = $this->uploadImage($data['main_image']);
        }
        $tagIds = $this->setTags($data);
        unset($data['tag_ids']);

        $post->update($data);
        $post->tags()->sync($tagIds);
        return $post;
    }

    public function setTags($data)
    {
        if (isset($data)) {
            $tagIds = $data['tag_ids'];
            return $tagIds;

        }
    }


    public function uploadImage($image)
    {
        if (isset($image)) {
            $fileName = Random::generate(20) . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/uploads', $fileName);
            return $fileName;
        }

    }



    public function removeImage()
    {

    }


}


