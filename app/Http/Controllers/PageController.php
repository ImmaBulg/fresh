<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Video;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function showPage($slug)
    {
        $menus = Menu::where(['status' => true])->orderBy('order')->get();
        switch($slug)
        {
            case 'video':
                $videos = Video::orderBy('order')->get();
                return view('site.video.list', compact('menus', 'videos'));
        }
    }
}
