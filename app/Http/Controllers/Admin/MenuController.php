<?php

namespace App\Http\Controllers\Admin;

use App\Models\Menu;
use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menus = Menu::orderBy('order')->get();

        return view('admin.menu.list', compact('menus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.menu.form');
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
            'title' => 'required|max:255',
            'en_title' => 'required|max:255',
            'slug' => 'required|max:255',
        ], [
            'title.required' => 'Поле "Название" обязательно к заполнению',
            'title.max' => 'Поле "Название" не должно превышать 255 символов',
            'en_title.required' => 'Поле "Название на английском" обязательно к заполнению',
            'en_title.max' => 'Поле "Название на английском" не должно превышать 255 символов',
            'slug.required' => 'Поле "Slug" обязательно к заполнению',
            'slug.max' => 'Поле "Slug" не должно превышать 255 символов',
        ]);

        if ($validation->fails())
            return redirect()->back()->withErrors($validation)->withInput();

        $menu_item = Menu::add($request->all());

        return redirect()->route('admin.menu.list')->with('success', 'Новый пункт добавлен');
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
    public function edit(Menu $menu)
    {
        return view('admin.menu.form', ['menu_item' => $menu]);
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
            'title' => 'required|max:255',
            'en_title' => 'required|max:255',
            'slug' => 'required|max:255',
        ], [
            'title.required' => 'Поле "Название" обязательно к заполнению',
            'title.max' => 'Поле "Название" не должно превышать 255 символов',
            'en_title.required' => 'Поле "Название на английском" обязательно к заполнению',
            'en_title.max' => 'Поле "Название на английском" не должно превышать 255 символов',
            'slug.required' => 'Поле "Slug" обязательно к заполнению',
            'slug.max' => 'Поле "Slug" не должно превышать 255 символов',
        ]);

        if ($validation->fails())
            return redirect()->back()->withErrors($validation)->withInput();

        $menu_item = Menu::where(['id' => $request->input('id')])->first();
        $menu_item->edit($request->all());
        return redirect()->route('admin.menu.list')->with('success', 'Пункт успешно обновлен');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menu $menu)
    {
        $menu->remove();

        return redirect()->route('admin.menu.list')->with('success', 'Пункт успешно удален');
    }

}
