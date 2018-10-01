<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CreatorSlider extends Model
{
    protected $table = 'creators_slider';
    protected $fillable = [
        'creator_id', 'images', 'code'
    ];

    public static function add($attributes, $images)
    {
        $creator_slider = new static($attributes);
        $creator_slider->save();

        $creator_slider->code = '#slider_' . $creator_slider->creator_id . '_' . $creator_slider->id . '#';
        $creator_slider->images = $creator_slider->uploadImages($images);
        $creator_slider->save();

        return $creator_slider;
    }

    public function uploadImages($images)
    {
        $imgs = json_decode($this->images);
        $last_index = end($images);
        $last_index = (int)str_replace(array('.jpeg', '.png', '.jpg'), '', $last_index) + 1;

        foreach ($images as $index => $image)
        {
            $image->storeAs("public/uploads/images/creators/sliders/$this->creator_id" . "_" . "$this->id", $last_index + $index . '.' . $image->extension());
            $imgs[] = $last_index + $index . '.' . $image->extension();
        }

        return json_encode($imgs);
    }

    public function getImages()
    {
        return json_decode($this->images);
    }

    public function removeImages()
    {
        \Storage::deleteDirectory("public/uploads/images/creators/sliders/$this->creator_id" . "_" . "$this->id");
        $this->images = null;

        $this->save();
    }

    public function edit($attributes, $images)
    {
        $this->update($attributes);

        if ($images) {
            $this->images = $this->uploadImages($images);
        }

        $this->save();
    }

    public function remove()
    {
        $this->removeImages();
        $this->delete();
    }

    public function getHtml()
    {
        $html = '<div class="news-slider"><div class="slider-news swiper-container"><div class="slide-block-scroll swiper-wrapper" data-swiper-parallax-duration="6000">';

        foreach ($this->getImages() as $image)
        {
            $html .= '<div class=" swiper-slide"><div class="slide-news-more"><img src="/storage/uploads/images/creators/sliders/' . $this->creator_id . '_' . $this->id . '/' . $image . '" alt=""></div></div>';
        }
        $html .= '</div></div><div class="swiper-scrollbar"></div></div>';

        return $html;
    }
}
