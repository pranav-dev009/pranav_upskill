<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class CustomCheck
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
        $url = $request->path();
        if(in_array($url, array('login', 'register')) && (Session::has('user'))) {
            return redirect()->route('items.index');
        }
        else if(Session::missing('user') && !in_array($url, array('login', 'register'))) {
            return redirect()->route('login.index');
        }
        return $next($request);
    }
}
