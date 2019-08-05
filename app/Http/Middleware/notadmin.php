<?php

namespace App\Http\Middleware;

use Auth; 
use Closure;

class notadmin
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
        if (!Auth::user() -> notadmin ) {
            # code...
            session()->flash('info', 'You donot have premission to do this'  );
           return redirect()->back();

        }
        return $next($request);
    }
}
