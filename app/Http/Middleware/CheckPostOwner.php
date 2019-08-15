<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\BlogContent;

class CheckPostOwner
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
        $user = auth()->user();
        $id = $request->method() === "POST" ? $request->id : encrypt_decrypt('decrypt', $request->id);
        $post = BlogContent::where('id', $id)->first();
        if ($post && ($post->author === $user->id || $user->user_type_id === 1)) {
            return $next($request);
        }
        session()->flash('auth-fail','Not authorized to proceed!');
        return redirect('/');
    }
}
