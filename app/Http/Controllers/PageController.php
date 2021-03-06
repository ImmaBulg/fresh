<?php

namespace App\Http\Controllers;

use App\Models\AboutTab;
use App\Models\Album;
use App\Models\ContactPage;
use App\Models\Creator;
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
                $best_videos = Video::where(['best' => true])->orderBy('created_at')->get();
                $last_videos = Video::orderBy('created_at')->get();
                return view('site.video.list', compact('menus', 'best_videos', 'last_videos'));
                break;
            case 'photo':
                $best_albums = Album::where(['best' => true])->orderBy('created_at')->get();
                $latest_albums = Album::orderBy('created_at')->get();
                return view('site.album.list', compact('menus', 'best_albums', 'latest_albums'));
            case 'contacts':
                $page = ContactPage::get()->first();
                return view('site.contacts', compact('page', 'menus'));
            case 'about':
                $tabs = AboutTab::where(['active' => true])->orderBy('order')->get();
                return view('site.about', compact('menus', 'tabs'));
            case 'creators':
                $creators = Creator::get();
                return view('site.creators.list', compact('menus', 'creators'));
        }
    }

    public function showVideo($id)
    {
        $menus = Menu::where(['status' => true])->orderBy('order')->get();
        $video = Video::where(['id' => $id])->first();
        return view('site.video.item', ['video' => $video, 'menus' => $menus]);
    }

    public function showAlbum($id)
    {
        $menus = Menu::where(['status' => true])->orderBy('order')->get();
        $albums = Album::get();
        $album = Album::where(['id' => $id])->first();
        return view('site.album.item', ['albums' => $albums, 'menus' => $menus, 'album' => $album]);
    }

    public function showCreator($id)
    {
        $menus = Menu::where(['status' => true])->orderBy('order')->get();
        $creator = Creator::where(['id' => $id])->first();

        return view('site.creators.item', compact('menus', 'creator'));
    }
}
