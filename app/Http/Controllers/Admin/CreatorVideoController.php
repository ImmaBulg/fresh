<?php

namespace App\Http\Controllers\Admin;

use App\Models\Creator;
use App\Models\CreatorVideo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CreatorVideoController extends Controller
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
        return view('admin.creators.video.form', compact('creator'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $creator_video = CreatorVideo::add($request->all());

        return redirect()->route('admin.creator.edit', Creator::where(['id' => $creator_video->creator_id])->first())->with('success', 'Видео успешно добавлен');
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
    public function edit(CreatorVideo $video)
    {
        return view('admin.creators.video.form', ['video' => $video]);
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
        $creator_video = CreatorVideo::where(['id' => $request->input('id')])->first();
        $creator_video->edit($request->all());

        return redirect()->route('admin.creator.edit', Creator::where(['id' => $creator_video->creator_id])->first())->with('success', 'Видео успешно обновлен');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(CreatorVideo $video)
    {
        $creator_id = $video->creator_id;
        $video->remove();
        return redirect()->route('admin.creator.edit', Creator::where(['id' => $creator_id])->first())->with('success', 'Видео успешно удален');
    }
}
