<?php

namespace App\Http\Controllers;

use App\Models\BlogContent;
use App\Models\Advert;

use Debugbar;

use App\User;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();
        switch ($user->user_type_id) {
            case 1:
                $adverts = Advert::all();
                $articles = BlogContent::count();
                $pending = BlogContent::where('status', 2)->count();
                $published = BlogContent::where('status', 1)->count();
                $staffs = 45;
                $pending_content = BlogContent::where('status', 2)->orderby('created_at', 'desc')->paginate(50);
                return view('pages.dashboard')->with(compact('articles', 'pending', 'published', 'staffs', 'adverts', 'pending_content'));
            default:
                $articles = BlogContent::where('author', $user->id)->count();
                $pending = BlogContent::where('author', $user->id)->where('status', 2)->count();
                $published = BlogContent::where('author', $user->id)->where('status', 1)->count();
                $pending_content = BlogContent::where('status', 2)->orderby('created_at', 'desc')->paginate(50);
                return view('pages.dashboard')->with(@compact('articles', 'pending', 'published', 'staffs', 'adverts', 'pending_content'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function viewPosts()
    {
        $user = auth()->user();
        Debugbar::warning('Starts');
        if ($user->user_type_id == "1") {
            $articles = BlogContent::orderby('publish_date', 'DESC')
                ->paginate(50);
        } else {
            $articles = BlogContent::where('author', $user->id)
                ->orderBy('publish_date', 'DESC')
                ->paginate(50);
        }
        $draft_articles = BlogContent::where('status', '3')->orderby('updated_at', 'DESC')->get();
        $scheduled_articles = BlogContent::where('status', '4')->orderby('schedule', 'DESC')->get();
        // return dd($articles);
        return view('pages.articles')->with(compact('articles', 'scheduled_articles', 'draft_articles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function approvalPending()
    {
        $user = auth()->user();
        switch ($user->user_type_id) {
            case 1:
                $articles = BlogContent::where('status', '2')->orderby('created_at', 'desc')->paginate(50);
                $articles_count =  BlogContent::where('status', '2')->count();
                return view('pages.pending_approval')->with(compact('articles', 'articles_count'));

            default:
                $articles = BlogContent::where('author', $user->id)->orderby('created_at', 'desc')->where('status', '2')->paginate(50);
                $articles_count =  BlogContent::where('author', $user->id)->where('status', '2')->count();
                return view('pages.pending_approval')->with(compact('articles', 'articles_count'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function publishedApproval()
    {
        if (auth()->user()->user_type_id == 1) {
            $articles = BlogContent::where('status', 1)->orderby('publish_date', 'desc')->paginate(50);
            $articles_count =  BlogContent::where('author', auth()->user()->id)->where('status', 1)->count();
        } else {
            $articles = BlogContent::where('author', auth()->user()->id)->orderby('publish_date', 'desc')->where('status', 1)->paginate(50);
            $articles_count =  BlogContent::where('author', auth()->user()->id)->where('status', 1)->count();
        }


        $published = "published";

        return view('pages.pending_approval')->with(compact('articles', 'published', 'articles_count'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function allDrafts()
    {
        $user = auth()->user();
        if ($user->user_type_id == 1) {
            $admin = User::where('user_type_id', '1')->pluck('id', 'id')->toArray();
            $articles = BlogContent::whereIn('author', $admin)->where('status', 3)->orderby('created_at', 'desc')->paginate(50);
            $articles_count =  BlogContent::where('author', $user->id)->where('status', 3)->count();
        } else {
            $articles = BlogContent::where('author', $user->id)->where('status', 3)->orderby('created_at', 'desc')->paginate(50);
            $articles_count =  BlogContent::where('author', $user->id)->where('status', 3)->count();
        }

        $draft = true;
        return view('pages.pending_approval')->with(compact('articles', 'articles_count', 'draft'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    public function scheduledPost()
    {
        $articles = BlogContent::where('status', 4)->orderby('created_at', 'desc')->paginate(15);
        $articles_count =  BlogContent::where('status', 4)->count();

        $schedule = true;
        return view('pages.pending_approval')->with(compact('articles', 'articles_count', 'schedule'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function logoutUser($id)
    {
        //
    }
}
