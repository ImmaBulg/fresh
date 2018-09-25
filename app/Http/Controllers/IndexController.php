<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Slide;
use Config;
use Request;

class IndexController extends Controller
{
    public function index()
    {
        $slides = Slide::orderBy('order')->get();
        $menus = Menu::where(['status' => true])->orderBy('order')->get();
        return view('site.index', compact('slides', 'menus'));
    }
}
