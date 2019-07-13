<?php

namespace App\Http\Controllers;

use App\Models\BlogContent;
use Illuminate\Http\Request;

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
            case 0:
                $adverts = 0;
                $pending_content = BlogContent::where('status', 2)->orderby('created_at', 'desc')->paginate(50);
                return view('pages.dashboard')->with(compact('adverts', 'pending_content'));
            case 1:
                $adverts = 0;
                $articles = BlogContent::where('author', auth()->user()->id)->count();
                $pending = BlogContent::where('author', auth()->user()->id)->where('status', 2)->count();
                $published = BlogContent::where('author', auth()->user()->id)->where('status', 1)->count();
                $staffs = 45;
                $pending_content = BlogContent::where('author', auth()->user()->id)->where('status', 2)->orderby('created_at', 'desc')->paginate(50);
                return view('pages.dashboard')->with(compact('articles', 'pending', 'published', 'staffs', 'adverts', 'pending_content'));
            default:
                return redirect('login');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
