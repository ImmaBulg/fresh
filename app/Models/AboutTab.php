<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AboutTab extends Model
{
    protected $fillable = [
        'ru_title', 'en_title', 'ru_description', 'en_description',
        'vimeo_id', 'order', 'active'
    ];

    public static function add($attributes)
    {
        $attributes['active'] = isset($attributes['active']);

        $last_tab = AboutTab::orderBy('order')->get()->last();

        $tab = new static($attributes);
        $tab->order = isset($last_tab) ? $last_tab->order + 100 : 100;
        $tab->save();

        return $tab;
    }

    public function edit($attributes)
    {
        $attributes['active'] = isset($attributes['active']);
        $this->update($attributes);
    }

    public function delete()
    {
        $this->remove();
    }
}
