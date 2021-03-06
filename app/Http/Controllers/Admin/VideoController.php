<?php

namespace App\Http\Controllers\Admin;

use App\Models\Video;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $videos = Video::orderBy('order')->get();

        return view('admin.video.list', compact('videos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.video.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'ru_title' => 'required|max:255',
            'en_title' => 'required|max:255',
            'vimeo_id' => 'required|max:255',
        ], [
            'ru_title.required' => 'Поле "Заголовок на русском" обязательно к заполнению',
            'ru_title.max' => 'Поле "Заголовок на русском" не должно превышать 255 символов',
            'en_title.required' => 'Поле "Заголовок на английском" обязательно к заполнению',
            'en_title.max' => 'Поле "Заголовок на английском" не должно превышать 255 символов',
            'vimeo_id.required' => 'Поле "ID видео" обязательно к заполнению',
        ]);

        if ($validation->fails())
            return redirect()->back()->withErrors($validation)->withInput();

        $video = Video::add($request->all());

        return redirect()->route('admin.video.list')->with('Success', 'Видео успешно добавлено');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Video $video)
    {
        return view('admin.video.form', ['video' => $video]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'ru_title' => 'required|max:255',
            'en_title' => 'required|max:255',
            'vimeo_id' => 'required|max:255',
        ], [
            'ru_title.required' => 'Поле "Заголовок на русском" обязательно к заполнению',
            'ru_title.max' => 'Поле "Заголовок на русском" не должно превышать 255 символов',
            'en_title.required' => 'Поле "Заголовок на английском" обязательно к заполнению',
            'en_title.max' => 'Поле "Заголовок на английском" не должно превышать 255 символов',
            'vimeo_id.required' => 'Поле "ID видео" обязательно к заполнению',
        ]);

        if ($validation->fails())
            return redirect()->back()->withErrors($validation)->withInput();


        $video = Video::where(['id' => $request->input('id')])->first();
        $video->edit($request->all());

        return redirect()->route('admin.video.list')->with('success', 'Слайд успешно обновлен');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Video $video)
    {
        $video->remove();
        return redirect()->route('admin.video.list')->with('success', 'Слайд успешно удален');
    }
}
