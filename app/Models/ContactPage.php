<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactPage extends Model
{
    protected $fillable = [
        'ru_contacts', 'en_contacts', 'map',
        'ru_executive', 'en_executive',
        'ru_executive_two', 'en_executive_two',
        'ru_producer', 'en_producer'
    ];

    public function rules()
    {
        return [
            [['ru_contacts', 'en_contacts', 'map',
                'ru_executive', 'en_executive',
                'ru_executive_two', 'en_executive_two',
                'ru_producer', 'en_producer'], 'text'],
        ];
    }

    public static function add($attributes)
    {
        $page = new static($attributes);
        $page->save();
        return $page;
    }

    public function edit($attributes)
    {
        $this->update($attributes);
    }
}
