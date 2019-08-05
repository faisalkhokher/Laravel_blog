<?php

namespace App\Http\Middleware;

use Auth;

use Closure;

class deleteadmin
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
        if (!Auth::user() -> deleteadmin ) {
            # code...
            session()->flash('info', 'Fuck OFF'  );
           return redirect()->back();
       
        }
         return $next($request);
    }
}
