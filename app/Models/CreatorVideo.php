<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\DocBlock\StandardTagFactory;

class CreatorVideo extends Model
{
    protected $table = 'creators_video';
    protected $fillable = [
        'creator_id', 'vimeo_id', 'img', 'code'
    ];

    public static function add($attributes)
    {
        $creator_video = new static($attributes);
        $creator_video->save();
        $creator_video->code = '#video_' . $creator_video->creator_id . '_' . $creator_video->id . '#';
        $creator_video->save();
        $creator_video->getVideoPreview();

        return $creator_video;
    }

    public function getVideoPreview()
    {
        $hash = unserialize(file_get_contents("http://vimeo.com/api/v2/video/$this->vimeo_id.php"));
        $url = $hash[0]['thumbnail_large'];
        $img = "public/uploads/images/creators/preview/$this->creator_id" . "_" . "$this->id.jpg";
        \Storage::put($img, file_get_contents($url));
        $this->img = "/storage/uploads/images/creators/preview/$this->creator_id" . "_" . "$this->id.jpg";
        $this->save();
    }

    public function edit($attributes)
    {
        $attributes['best'] = isset($attributes['best']) ? 1 : 0;
        $this->update($attributes);
        $this->getVideoPreview();
    }

    public function removeImage()
    {
        \Storage::delete("/public/uploads/images/creators/preview/$this->creator_id" . "_" . "$this->id.jpg");
        $this->img = null;

        $this->save();
    }

    public function remove()
    {
        $this->removeImage();
        $this->delete();
    }

    public function getHtml()
    {
        $html = '<div class="video-block video-news-more"><div class="video-top"><iframe class="video-about" src="https://player.vimeo.com/video/' . $this->vimeo_id . '?title=0&byline=0&portrait=0&transparent=0" frameborder="0" webkitallowfullscreen="" mozallowfullscreen="" allowfullscreen="" data-ready="true" allow=\'autoplay;\'></iframe></div><div class="video-btn"><img src="/img/play-btn.svg"></div></div>';

        return $html;
    }
}
