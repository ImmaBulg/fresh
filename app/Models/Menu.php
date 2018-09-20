<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $fillable = [
        'title', 'slug', 'parent_id'
    ];

    /**
     * Добавляет новый пунк меню и возвращает его
     * @param array $attributes
     * @return Post
     */
    public static function add($attributes): self
    {
        $menu_item = new static($attributes);
        $menu_item->save();

        return $menu_item;
    }

    public function edit($attributes)
    {
        $this->update($attributes);
    }

    public function remove()
    {
        $this->delete();
    }
}
