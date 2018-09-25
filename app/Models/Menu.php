<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $fillable = [
        'title', 'en_title', 'slug', 'status', 'outer_link', 'order'
    ];

    /**
     * Добавляет новый пунк меню и возвращает его
     * @param array $attributes
     * @return Post
     */
    public static function add($attributes): self
    {
        $menu_item = new static($attributes);
        $tmp = Menu::get()->last();
        $menu_item->status = isset($attributes['status']) ? 1 : 0;
        $menu_item->outer_link = isset($attributes['outer_link']) ? 1 : 0;
        $menu_item->order = isset($tmp) ? $tmp->order + 100 : 100;
        $menu_item->save();

        return $menu_item;
    }

    public function edit($attributes)
    {
        $attributes['status'] = isset($attributes['status']) ? 1 : 0;
        $attributes['outer_link'] = isset($attributes['outer_link']) ? 1 : 0;
        $this->update($attributes);
    }

    public function remove()
    {
        $this->delete();
    }
}
