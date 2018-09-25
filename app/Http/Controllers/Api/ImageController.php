<?php

namespace App\Http\Controllers\Api;

use App\Models\Album;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ImageController extends Controller
{
    public function deleteAlbumImage(Request $request)
    {
        $image = $request->input('image');
        $album_id = $request->input('album_id');
        \Storage::delete("public/uploads/images/albums/$album_id/$image");
        $album = Album::where(['id' => $album_id])->first();
        $images = json_decode($album->imgs);
        $imgs = [];
        foreach ($images as $img)
        {
            if ($img !== $image)
                $imgs[] = $img;
        }

        $album->imgs = json_encode($imgs);
        $album->save();
        return $imgs;
    }
}
