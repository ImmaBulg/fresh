<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Creator extends Model
{
    protected $fillable = [
        'ru_title', 'en_title', 'ru_description', 'en_description',
        'vimeo_id', 'template'
    ];

    public static function add($attributes)
    {
        $creator = new static($attributes);
        $creator->save();

        return $creator;
    }

    public function edit($attributes)
    {
        $this->update($attributes);
    }

    public function delete()
    {
        $this->remove();
    }

    public function renderPage()
    {
        $rows = explode("\r\n", $this->template);
        $rows = array_map( function($row) {
            return '<div class="news-more-block">' . $row . '</div>';
        }, $rows);
        $rows = implode('', $rows);
        $texts = CreatorText::where(['creator_id' => $this->id])->get();
        $videos = CreatorVideo::where(['creator_id' => $this->id])->get();
        $sliders = CreatorSlider::where(['creator_id' => $this->id])->get();

        foreach($texts as $text)
        {
            $rows = str_replace($text->code, $text->getHtml(), $rows);
        }
        foreach($videos as $video)
        {
            $rows = str_replace($video->code, $video->getHtml(), $rows);
        }
        foreach($sliders as $slider)
        {
            $rows = str_replace($slider->code, $slider->getHtml(), $rows);
        }

        return $rows;
    }
}
