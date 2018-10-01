<?php

namespace App\Http\Controllers\Admin;

use App\Models\Creator;
use App\Models\CreatorSlider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CreatorSliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($creator)
    {
        return view('admin.creators.slider.form', compact('creator'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $attrbiutes = $request->all();
        unset($attrbiutes['imgs']);

        $creator_slider = CreatorSlider::add($attrbiutes, $request->file('imgs'));

        return redirect()->route('admin.creator.edit', Creator::where(['id' => $creator_slider->creator_id])->first())->with('success', 'Слайдер успешно добавлен');
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
    public function edit(CreatorSlider $slider)
    {
        return view('admin.creators.slider.form', ['creator_slider' => $slider]);
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

        $attrbiutes = $request->all();
        unset($attrbiutes['imgs']);

        $creator_slider = CreatorSlider::where(['id' => $request->input('id')])->first();
        $creator_slider->edit($attrbiutes, $request->file('imgs') ?: null);

        return redirect()->route('admin.creator.edit', Creator::where(['id' => $creator_slider->creator_id])->first())->with('success', 'Слайдер успешно обновлен');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(CreatorSlider $slider)
    {
        $creator_id = $slider->creator_id;
        $slider->remove();
        return redirect()->route('admin.creator.edit', Creator::where(['id' => $creator_id])->first())->with('success', 'Слайдер успешно удален');
    }
}
