<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class AdminMiddleware
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
        // if(Auth::check())
        // {
        //     if(Auth::user()->role_as == '1')
        //     {
        //         return $next($request);
        //     }
        //     else
        //     {
        //         return redirect('/home')->with('warning','Access Denied! as you are not as admin');
        //     }
        // }
        // else
        // {
        //     return redirect('/home')->with('danger','Please Login First');
        // }
        if(auth()->user()->role_as == 1 || auth()->user()->role_as == 10){
            return $next($request);
        }
   
        return redirect('home')->with('error',"You don't have admin access.");
    }
}
