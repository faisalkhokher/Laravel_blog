<?php

namespace App\Http\Middleware;

use Auth;

use Closure;

class Admin
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
        if (!Auth::user()-> admin) {
            # code...
           session()->flash('error', 'You Donot Have Premission Todo This');
           return redirect()->back();
        }
      




        return $next($request);
    }
}
