<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CreatorText extends Model
{
    protected $table = 'creators_text';
    protected $fillable = [
        'creator_id', 'ru_text', 'en_text', 'code'
    ];

    public static function add($attributes)
    {
        $creator_text = new static($attributes);
        $creator_text->save();

        $creator_text->code = '#text_' . $creator_text->creator_id . '_' . $creator_text->id . '#';
        $creator_text->save();

        return $creator_text;
    }

    public function edit($attributes)
    {
        $this->update($attributes);
    }

    public function remove()
    {
        $this->delete();
    }

    public function getHtml()
    {
        $html = '<div class="news-more-txt-block container-mob"><div class="news-more-text"><span class="news-more-txt">' . $this->{config('app.locale') . '_text'} . '</span></div></div>';

        return $html;
    }
}
