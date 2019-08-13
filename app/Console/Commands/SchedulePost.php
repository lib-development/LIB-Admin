<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\App;


use Illuminate\Support\Carbon;
use DB;
use App\Models\BlogContent;
use Illuminate\Support\Facades\Log;
use Spatie\Sitemap\SitemapGenerator;

class SchedulePost extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'schedule:post';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $time = Carbon::now()->addHour();
        $currentTimePlusThirtySeconds = Carbon::now()->addSeconds(30)->addHour();

        $posts = BlogContent::whereBetween('schedule',[$time, $currentTimePlusThirtySeconds])
                ->where('status','4')
                ->get();
        $postsCount = $posts->count();
        echo($time . "\n" . $currentTimePlusThirtySeconds);
        print_r($postsCount);
        if($postsCount >= 1)
        {
            foreach ($posts as $post){
                $post->status = 1;
                $post->schedule = null;
                $post->publish_date = $time;
                $post->save();
            }
            return Log::info($postsCount . ' Post(s)'. ' successfully scheduled.');
        }
        return Log::info('No posts at this time.');
    }
}
