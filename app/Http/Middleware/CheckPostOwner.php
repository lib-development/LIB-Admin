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
        $id = encrypt_decrypt('decrypt', $request->id);
        $post = BlogContent::where('id', $id)->first();
        if (($post && $post->author === auth()->user()->id) || auth()->user()->user_type_id === '1') {
            return $next($request);
        }
        session()->flash('auth-fail','Not authorized to proceed!');
        return redirect('/');
    }
}
