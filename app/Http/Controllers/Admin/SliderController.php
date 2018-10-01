<?php

namespace App\Http\Controllers\Admin;

use App\Models\Slide;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slides = Slide::orderBy('order')->get();

        return view('admin.slider.list', compact('slides'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.slider.form');
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
            'ru_description' => 'required|max:255',
            'en_description' => 'required|max:255',
        ], [
            'ru_title.required' => 'Поле "Заголовок на русском" обязательно к заполнению',
            'ru_title.max' => 'Поле "Заголовок на русском" не должно превышать 255 символов',
            'en_title.required' => 'Поле "Заголовок на английском" обязательно к заполнению',
            'en_title.max' => 'Поле "Заголовок на английском" не должно превышать 255 символов',
            'ru_description.required' => 'Поле "Описание на русском" обязательно к заполнению',
            'en_description.required' => 'Поле "Описание на английском" обязательно к заполнению',
        ]);

        if ($validation->fails())
            return redirect()->back()->withErrors($validation)->withInput();


        $slide = Slide::add($request->all());
        $slide->uploadImage([$request->file('desc_img'), $request->file('mob_img')]);
        return redirect()->route('admin.slider.list')->with('success', 'Слайд успешно добавлен');
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
    public function edit(Slide $slide)
    {
        return view('admin.slider.form', ['slide' => $slide]);
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
            'ru_description' => 'required|max:255',
            'en_description' => 'required|max:255',
        ], [
            'ru_title.required' => 'Поле "Заголовок на русском" обязательно к заполнению',
            'ru_title.max' => 'Поле "Заголовок на русском" не должно превышать 255 символов',
            'en_title.required' => 'Поле "Заголовок на английском" обязательно к заполнению',
            'en_title.max' => 'Поле "Заголовок на английском" не должно превышать 255 символов',
            'ru_description.required' => 'Поле "Описание на русском" обязательно к заполнению',
            'en_description.required' => 'Поле "Описание на английском" обязательно к заполнению',
        ]);

        if ($validation->fails())
            return redirect()->back()->withErrors($validation)->withInput();

        $slide = Slide::where(['id' => $request->input('id')])->first();
        $slide->update($request->all());
        $files = [];
        if ($request->file('desc_img'))
            $files['desc'] = $request->file('desc_img');
        if ($request->file('mob_img'))
            $files['mob'] = $request->file('mob_img');

        $slide->updateImages($files);

        return redirect()->route('admin.slider.list')->with('success', 'Слайд успешно обновлен');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Slide $slide)
    {
        $slide->remove();
        return redirect()->route('admin.slider.list')->with('success', 'Слайд успешно удален');
    }
}
