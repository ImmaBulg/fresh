<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LanguageController extends Controller
{
    public function setLanguage(Request $request)
    {
        $response = new \Illuminate\Http\Response('Set Lang');
        return $response->withCookie(cookie()->forever('lang', $request->input('language')));
    }
}
