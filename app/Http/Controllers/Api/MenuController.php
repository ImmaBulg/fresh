<?php

namespace App\Http\Controllers\Api;

use App\Models\Menu;
use App\Models\Slide;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MenuController extends Controller
{
    public function updateMenuOrder(Request $request)
    {
        $items = $request->input('items');
        foreach ($items as $index => $item) {
            $menu_item = Menu::find(['id' => $item['id']])->first();
            $menu_item->order = ($index + 1) * 100;
            $menu_item->save();
        }
        return ['answer' => 'success'];
    }

    public function updateSlideOrder(Request $request)
    {
        $items = $request->input('items');
        foreach ($items as $index => $item) {
            $slide = Slide::find(['id' => $item['id']])->first();
            $slide->order = ($index + 1) * 100;
            $slide->save();
        }
        return ['answer' => 'success'];
    }
}
