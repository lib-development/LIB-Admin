<?php

namespace App\Http\Controllers\Blog;

use App\Models\BlogContent;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Services\Util;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        // dd($request->all());
        $data = $request->all();
        $search = Util::search_query_constructor((array_filter(explode("-", trim(strip_tags(strtolower($data['search'])))))), "lower(title)", true);

        $articles = BlogContent::whereRaw($search)->where('status','1')->orderby('created_at','desc')->paginate(15);
        $search = $data['search'];

        return view('pages.articles')->with(compact('search','articles'));
    }
}
