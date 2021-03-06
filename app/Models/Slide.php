<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Slide extends Model
{
    protected $fillable = [
        'ru_title', 'en_title', 'ru_description', 'en_description', 'mob_img', 'desc_img', 'order',
    ];

    public static function add($attributes): self
    {
        $slide = new static($attributes);
        $last_slide = Slide::get()->last();
        $slide->order = isset($last_slide) ? $last_slide->order + 100 : 100;
        $slide->save();

        return $slide;
    }

    public function uploadImage($files)
    {
        /*
         * TODO
         * Сделать резайс картинок (пока неизвестен размер для ресайза)
         */
        $files[0]->storeAs('public/uploads/images', 'desc_img_' . $this->id . '.' . $files[0]->extension());
        $files[1]->storeAs('public/uploads/images', 'mob_img_' . $this->id . '.' . $files[1]->extension());
        $this->desc_img = 'desc_img_' . $this->id . '.' . $files[0]->extension();
        $this->mob_img = 'mob_img_' . $this->id . '.' . $files[1]->extension();
        $this->save();
    }

    public function removeImage()
    {
        Storage::delete("/public/uploads/images/$this->desc_img");
        Storage::delete("/public/uploads/images/$this->mob_img");
        $this->desc_img = null;
        $this->mob_img = null;

        $this->save();
    }

    public function updateImages($files)
    {
        if (isset($files['desc'])) {
            $files['desc']->storeAs('public/uploads/images', 'desc_img_' . $this->id . '.' . $files['desc']->extension());
            $this->desc_img = 'desc_img_' . $this->id . '.' . $files['desc']->extension();
        }
        if (isset($files['mob'])) {
            $files['mob']->storeAs('public/uploads/images', 'mob_img_' . $this->id . '.' . $files['mob']->extension());
            $this->mob_img = 'mob_img_' . $this->id . '.' . $files['mob']->extension();
        }

        $this->save();
    }

    public function edit($attributes)
    {
        $this->update($attributes);
    }

    public function remove()
    {
        $this->removeImage();
        $this->delete();
    }
}
