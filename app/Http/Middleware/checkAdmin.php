<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;

class checkAdmin
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
        $user = Session::get('user');
        $check = Session::has('user');
        if ($check) {
            if ($user['role'] != 'admin') {
                return redirect('/');
            }else{
                return $next($request);
            }
        }else{
            return redirect('/');
        }
    }
}
