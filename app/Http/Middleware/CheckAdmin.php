<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use App\Model\User;

class CheckAdmin
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
        if(Auth::check())
        {
            $user = User::find(Auth::user()->id);
            if($user->hasRole('admin') || $user->hasRole('superadmin')) return $next($request);
            else redirect()->route('home');
        }
        return redirect()->route('login');

    }
}
