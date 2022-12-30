<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Translate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $locale = auth()->user()->default_lang;        
        app()->setLocale($locale);
        
        return $next($request);
    }
}
