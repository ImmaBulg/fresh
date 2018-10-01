<?php

namespace App\Http\Controllers\Admin;

use App\Models\Creator;
use App\Models\CreatorSlider;
use App\Models\CreatorText;
use App\Models\CreatorVideo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;

class CreatorController extends Controller
{
    public function index()
    {
        $creators = Creator::get();

        return view('admin.creators.list', compact('creators'));
    }

    public function create()
    {
        return view('admin.creators.form');
    }

    public function store(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'ru_title' => 'required|max:255',
            'en_title' => 'required|max:255',
        ], [
            'ru_title.required' => 'Поле "Заголовок на русском" обязательно к заполнению',
            'ru_title.max' => 'Поле "Заголовок на русском" не должно превышать 255 символов',
            'en_title.required' => 'Поле "Заголовок на английском" обязательно к заполнению',
            'en_title.max' => 'Поле "Заголовок на английском" не должно превышать 255 символов',
        ]);

        if ($validation->fails())
            return redirect()->back()->withErrors($validation)->withInput();

        $creator = Creator::add($request->all());

        return redirect()->route('admin.creator.edit', compact('creator'));
    }

    public function edit(Creator $creator)
    {
        $texts = CreatorText::where(['creator_id' => $creator->id])->get();
        $videos = CreatorVideo::where(['creator_id' => $creator->id])->get();
        $sliders = CreatorSlider::where(['creator_id' => $creator->id])->get();

        return view('admin.creators.form', compact('creator', 'texts', 'videos', 'sliders'));
    }

    public function update(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'ru_title' => 'required|max:255',
            'en_title' => 'required|max:255',
        ], [
            'ru_title.required' => 'Поле "Заголовок на русском" обязательно к заполнению',
            'ru_title.max' => 'Поле "Заголовок на русском" не должно превышать 255 символов',
            'en_title.required' => 'Поле "Заголовок на английском" обязательно к заполнению',
            'en_title.max' => 'Поле "Заголовок на английском" не должно превышать 255 символов',
        ]);

        if ($validation->fails())
            return redirect()->back()->withErrors($validation)->withInput();

        $creator = Creator::where(['id' => $request->input('id')])->first();
        $creator->edit($request->all());

        return redirect()->route('admin.creator.list');
    }
}
