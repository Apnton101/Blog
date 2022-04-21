<?php

namespace App\Service;

use App\Models\Post;

class PostService
{

    private $image;

    public function __construct(ImageService $image)
    {
        $this->image = $image;
    }


    public function store($data)
    {
        if (isset($data['preview_image'])) {
            $data['preview_image'] = $this->image->uploadImage($data['preview_image']);
        }
        if (isset($data['main_image'])) {
            $data['main_image'] = $this->image->uploadImage($data['main_image']);
        }
        $post = Post::firstOrCreate($data);

        if (isset($data['tag_ids'])) {
            $post->tags()->attach($data['tag_ids']);
        }


    }

    public function update($data, $post)
    {

        $this->image->removeImage($post);
        if (isset($data['preview_image'])) {
            $data['preview_image'] = $this->image->uploadImage($data['preview_image']);
        }
        if (isset($data['main_image'])) {
            $data['main_image'] = $this->image->uploadImage($data['main_image']);
        }

        $post->update($data);
        if (isset($data['tag_ids'])) {

            $post->tags()->sync($data['tag_ids']);
        }
        return $post = $post->fresh();
    }

    public function delete(Post $post)
    {
        $this->image->removeImage($post);
        $post->tags()->detach();
        $post->delete();
    }

//    public function store($data)
//    {
//
//        if (isset($data['preview_image'])) {
//            $data['preview_image'] = $this->uploadImage($data['preview_image']);
//        }
//        if (isset($data['main_image'])) {
//            $data['main_image'] = $this->uploadImage($data['main_image']);
//        }
//        $tagIds = $this->setTags($data);
//        unset($data['tag_ids']);
//
//        $post = Post::firstOrCreate($data);
//        $post->tags()->attach($tagIds);
//
//
//    }
//
//
//    public function update($data, $post)
//    {
//        if (isset($data['preview_image'])) {
//            $data['preview_image'] = $this->uploadImage($data['preview_image']);
//        }
//        if (isset($data['main_image'])) {
//            $data['main_image'] = $this->uploadImage($data['main_image']);
//        }
//        $tagIds = $this->setTags($data);
//        unset($data['tag_ids']);
//
//        $post->update($data);
//        $post->tags()->sync($tagIds);
//        return $post;
//    }
//
//    public function setTags($data)
//    {
//        if (isset($data)) {
//            $tagIds = $data['tag_ids'];
//            return $tagIds;
//
//        }
//    }
//
//
//    public function uploadImage($image)
//    {
//        if (isset($image)) {
//            $fileName = Random::generate(20) . '.' . $image->getClientOriginalExtension();
//            $image->storeAs('public/uploads', $fileName);
//            return $fileName;
//        }
//
//    }
//
//
//
//    public function removeImage()
//    {
//
//    }


}


