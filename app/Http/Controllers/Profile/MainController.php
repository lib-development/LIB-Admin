<?php

namespace App\Http\Controllers\Profile;

use App\Models\User;
use App\Models\BlogContent;

use App\Http\Controllers\Controller;

class MainController extends Controller
{
    public function viewProfile($userId)
    {
        $id = encrypt_decrypt('decrypt', $userId);
        //bring out the report and the content produced by this user
        $articles = BlogContent::where('author', $id)->paginate(15);
        $articles_c = BlogContent::where('author', $id)->count();
        //show pending articles
        $pending = BlogContent::where('author', $id)->where('status', '2')->paginate(50);
        $pending_c = BlogContent::where('author', $id)->where('status', '2')->count();

        //get all the published article
        $published = BlogContent::where('author', $id)->where('status', '1')->paginate(50);

        $published_c = BlogContent::where('author', $id)->where('status', '1')->count();

        $staff = User::where('id', $id)->first();

        return view('pages.profile')->with(compact('articles', 'pending', 'published', 'staff', 'pending_c', 'published_c', 'articles_c'));
    }
}
