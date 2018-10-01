<?php

namespace App\Http\Controllers\Admin;

use App\Models\Creator;
use App\Models\CreatorText;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CreatorTextController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($creator)
    {
        return view('admin.creators.text.form', compact('creator'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $creator_text = CreatorText::add($request->all());

        return redirect()->route('admin.creator.edit', Creator::where(['id' => $creator_text->creator_id])->first())->with('success', 'Текст успешно добавлен');
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
    public function edit(CreatorText $text)
    {
        return view('admin.creators.text.form', ['creator_text' => $text]);
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
        $creator_text = CreatorText::where(['id' => $request->input('id')])->first();
        $creator_text->edit($request->all());

        return redirect()->route('admin.creator.edit', Creator::where(['id' => $creator_text->creator_id])->first())->with('success', 'Текст успешно обновлен');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(CreatorText $text)
    {
        $creator_id = $text->creator_id;
        $text->remove();
        return redirect()->route('admin.creator.edit', Creator::where(['id' => $creator_id])->first())->with('success', 'Текст успешно удален');
    }
}
