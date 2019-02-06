<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

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
        if (Auth::user()->role) {
           return $next($request);
        }
        // session()->flash('admin', 'Hanya Administrator yang dapat Mengakses Halaman Tersebut!');
        return redirect()->route('dashboard.user');
    }
}
