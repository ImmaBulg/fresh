<?php

namespace App\Http\Controllers\Admin;

use App\Models\Album;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $albums = Album::orderBy('order')->get();

        return view('admin.album.list', compact('albums'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.album.form');
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
        ], [
            'ru_title.required' => 'Поле "Заголовок на русском" обязательно к заполнению',
            'ru_title.max' => 'Поле "Заголовок на русском" не должно превышать 255 символов',
            'en_title.required' => 'Поле "Заголовок на английском" обязательно к заполнению',
            'en_title.max' => 'Поле "Заголовок на английском" не должно превышать 255 символов',
        ]);

        if ($validation->fails())
            return redirect()->back()->withErrors($validation)->withInput();

        $attrbiutes = $request->all();
        unset($attrbiutes['imgs'], $attrbiutes['title_img']);

        $album = Album::add($attrbiutes, $request->file('title_img'), $request->file('imgs'));

        return redirect()->route('admin.album.list')->with('Success', 'Альбом успешно добавлено');
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
    public function edit(Album $album)
    {
        return view('admin.album.form', ['album' => $album]);
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
        ], [
            'ru_title.required' => 'Поле "Заголовок на русском" обязательно к заполнению',
            'ru_title.max' => 'Поле "Заголовок на русском" не должно превышать 255 символов',
            'en_title.required' => 'Поле "Заголовок на английском" обязательно к заполнению',
            'en_title.max' => 'Поле "Заголовок на английском" не должно превышать 255 символов',
        ]);

        if ($validation->fails())
            return redirect()->back()->withErrors($validation)->withInput();

        $attrbiutes = $request->all();
        unset($attrbiutes['imgs'], $attrbiutes['title_img']);

        $album = Album::where(['id' => $request->input('id')])->first();
        $album->edit($attrbiutes, $request->file('title_img') ?: null, $request->file('imgs') ?: null);

        return redirect()->route('admin.album.list')->with('success', 'Альбом успешно обновлен');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Album $album)
    {
        $album->remove();
        return redirect()->route('admin.album.list')->with('success', 'Альбом успешно удален');
    }
}
