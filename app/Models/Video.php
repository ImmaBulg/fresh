<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $fillable = [
        'ru_title', 'en_title', 'ru_subtitle', 'en_subtitle', 'ru_description', 'en_description',
        'ru_direction', 'en_direction', 'ru_dop', 'en_dop', 'ru_executive', 'en_executive', 'ru_producer', 'en_producer',
        'ru_agency', 'en_agency', 'ru_client', 'en_client', 'order', 'url', 'img', 'best'
    ];

    public static function add($attributes)
    {
        $video = new static($attributes);
        $last_video = Video::get()->last();
        $video->order = isset($last_video) ? $last_video->order + 100 : 100;
        $video->best = isset($attributes['best']) ? 1 : 0;
        $video->save();

        return $video;
    }

    public function edit($attributes)
    {
        $attributes['best'] = isset($attributes['best']) ? 1 : 0;
        $this->update($attributes);
    }

    public function remove()
    {
        $this->delete();
    }
}
