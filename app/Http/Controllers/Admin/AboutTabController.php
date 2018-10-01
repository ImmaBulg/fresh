<?php

namespace App\Http\Controllers\Admin;

use App\Models\AboutTab;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;

class AboutTabController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tabs = AboutTab::orderBy('order')->get();

        return view('admin.about.list', compact('tabs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.about.form');
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

        $tab = AboutTab::add($request->all());

        return redirect()->route('admin.about.list')->with('success', 'Вкладка успешно добавлена');
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
    public function edit(AboutTab $tab)
    {
        return view('admin.about.form', compact('tab'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
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

        $tab = Album::where(['id' => $request->input('id')])->first();
        $tab->edit($request->all());

        return redirect()->route('admin.about.list')->with('success', 'Вкладка успешно обновлена');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(AboutTab $tab)
    {
        $tab->remove();
        return redirect()->route('admin.about.list')->with('success', 'Вкладка успешно удалена');
    }
}
