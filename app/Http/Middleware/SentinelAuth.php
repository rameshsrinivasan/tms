<?php

namespace App\Http\Middleware;

use Closure;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Kamaln7\Toastr\Facades\Toastr;

class SentinelAuth
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
		if(Sentinel::check())
		{
			Toastr::info('This page is only accessible to guests', 'Guest Access Only');
			return redirect()->route('home');
		}

		return $next($request);
	}
}