<?php

namespace App\Http\Controllers\Report;

use App\Models\User;
use App\Models\BlogContent;

use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;

class MainController extends Controller
{

    public function reports($time)
    {
        if ($time == "now") {
            $start = Carbon::now()->subDay();
            $end = Carbon::now()->endOfDay();
            $title = "Report for Today.";
        } elseif ($time == "week") {
            $start = Carbon::now()->subWeek();
            $end = Carbon::now();
            $title = "Report for This Week.";
        } elseif ($time == "month") {
            $start = Carbon::now()->subMonth();
            $end = Carbon::now();
            $title = "Report for the Month.";
        } else {
            $status = true;
            $title = "Report of all time.";
        }
        if (isset($status) && $status) {
            $articles = BlogContent::where('status', '1')->orderby('views', 'desc')->paginate(15);
        } else {
            $articles = BlogContent::where('status', '1')->wherebetween('publish_date', [$start, $end])->orderby('views', 'desc')->paginate(15);
        }

        return view('pages.reports')->with(compact('articles', 'title', 'time'));
    }
}
