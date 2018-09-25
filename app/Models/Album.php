<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    protected $fillable = [
        'ru_title', 'en_title', 'ru_description', 'en_description', 'ru_photographer', 'en_photographer',
        'ru_assistant', 'en_assistant', 'ru_executive', 'en_executive', 'ru_client', 'en_client',
        'ru_subtitle', 'en_subtitle', 'order', 'best', 'title_img', 'imgs'
    ];

    public static function add($attributes, $title_img, $images)
    {
        $album = new static($attributes);
        $last_album = Album::orderBy('order')->get()->last();
        $album->order = isset($last_album) ? $last_album->order + 100 : 100;
        $album->best = isset($attributes['best']) ? 1 : 0;
        $album->save();

        $album->imgs = $album->uploadImages($images);
        $album->title_img = $album->uploadImage($title_img);
        $album->save();

        return $album;
    }

    public function uploadImages($images)
    {
        $imgs = json_decode($this->imgs);
        $last_index = end($imgs);
        $last_index = (int)str_replace(array('.jpeg', '.png', '.jpg'), '', $last_index) + 1;

        foreach ($images as $index => $image)
        {
            $image->storeAs("public/uploads/images/albums/$this->id", $last_index + $index . '.' . $image->extension());
            $imgs[] = $last_index + $index . '.' . $image->extension();
        }

        return json_encode($imgs);
    }

    public function uploadImage($image)
    {
        $image->storeAs("public/uploads/images/albums/$this->id", 'title_img.' . $image->extension());
        return 'title_img.' . $image->extension();
    }

    public function getImages()
    {
        return json_decode($this->imgs);
    }

    public function removeImages()
    {
        \Storage::deleteDirectory("public/uploads/images/albums/$this->id");
        $this->imgs = null;
        $this->title_img = null;

        $this->save();
    }

    public function removeTitleImg()
    {
        \Storage::delete("public/uploads/images/albums/$this->id/$this->title_img");
        $this->title_img = null;

        $this->save();
    }

    public function edit($attributes, $title_img, $images)
    {
        $attributes['best'] = isset($attributes['best']) ? 1 : 0;
        $this->update($attributes);

        if ($title_img) {
            $this->removeTitleImg();
            $this->title_img = $this->uploadImage($title_img);
        }
        if ($images) {
            $this->imgs = $this->uploadImages($images);
        }

        $this->save();
    }

    public function remove()
    {
        $this->removeImages();
        $this->delete();
    }
}
