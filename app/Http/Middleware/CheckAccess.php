<?php

namespace App\Http\Middleware;

use Closure;
use App\Post;

class CheckAccess
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
			$id = $request->id;
			$sesuser_id = $request->session()->get('user_id');
			$sesrole = $request->session()->get('role');
            $post = Post::where('id',$id)->get()->first();
            $user_id = $post->user_id;
            if ($sesuser_id != $user_id && $sesrole!=1) {
                // better use shorthand
                return redirect()->to('/post');
            }

            return $next($request);
    }
}
