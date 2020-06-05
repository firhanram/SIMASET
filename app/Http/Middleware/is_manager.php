<?php

namespace App\Http\Middleware;

use Closure;

class is_manager
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
        if($request->session()->get('role_id') == 2){
            return $next($request);
        }

        return redirect('/login');
    }
}
