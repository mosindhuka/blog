<?php

namespace App\Http\Middleware;

use Closure;

class CheckAuth
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
		$user_id = $request->session()->get('user_id');
		if(empty($user_id))
		 {				
				return redirect('/');
		 }
         return $next($request);
    }
}
