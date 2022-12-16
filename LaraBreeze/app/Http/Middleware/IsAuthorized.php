<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Route;

class IsAuthorized
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
        $path = Route::currentRouteName();	    
        $i = 0;
        foreach(auth()->user()->group->modules as $key => $val):            
            if (Str::of($val->link)->contains(['|'])):
                $arr_link = explode('|', $val->link);                
                $module[$i] = $arr_link[0];
                $i++;
                $module[$i] = $arr_link[1];
                $i++;
            else:
                $module[$i] = $val->link;
                $i++;
            endif;
        endforeach;

        if(!collect($module)->contains($path)) {
            abort('403');
        }
        return $next($request);
    }
}
