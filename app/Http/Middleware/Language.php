<?php

namespace App\Http\Middleware;

use Closure;
use Session;
use Config;
use App;

class Language
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

     //   echo "<script>alert('ok');</script>";

        $lang = Session::get('lang',Config::get('app.locale'));

        App::setlocale($lang);

        return $next($request);
    }



}
