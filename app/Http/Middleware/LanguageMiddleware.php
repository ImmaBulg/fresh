<?php

namespace App\Http\Middleware;

use App;
use Closure;
use Config;
use Request;

class LanguageMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $language = Request::cookie('lang', Config::get('app.locale'));
        App::setLocale($language);

        return $next($request);
    }
}
