<?php

namespace App\Http\Middleware;

use Closure;

use App\Post;

class PostCreatedByCurrentUserMiddleware
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
        $post = Post::find($request->parameter('post_id'));

        // Managers and Admins get to do whatever it is they want with posts
        if (Auth::user()->hasRole('admin') || Auth::user()->hasRole('manager')) {
            return $next($request);
        }

        if ($post->user_id != Auth::user()->id) {
            return response('Unauthorized.', 401);
        }

        return $next($request);
    }
}
