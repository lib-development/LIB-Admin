<?php
    
    namespace App\Console\Commands;
    
    use Illuminate\Console\Command;
    use Illuminate\Support\Facades\App;
    
    
    use Illuminate\Support\Carbon;
    use DB;
    use App\Models\BlogContent;
    use Illuminate\Support\Facades\Log;
    
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
        protected $description = 'For scheduling posts at particular times';
        
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
            $currentTimeSubtractThirtySeconds = Carbon::now()->subSeconds(30)->addHour();
            $posts = BlogContent::
//            whereBetween('schedule', [$currentTimeSubtractThirtySeconds, $time])
                where('schedule', '<=', $time)
                ->where('status', '4')
                ->get();
            $postsCount = $posts->count();
            echo ($time . "\n" . $currentTimeSubtractThirtySeconds);
            print_r($postsCount);
            if ($postsCount >= 1) {
                foreach ($posts as $post) {
                    $post->status = 1;
                    $post->schedule = null;
                    $post->publish_date = $time;
                    $post->save();
                }
                
                return Log::info($postsCount . ' Post(s)' . ' successfully scheduled.');
                // return $this->cleanUpAddToSitemap($posts);
            }
            return Log::info('No posts at this time.');
        }
        
        public function cleanUpAddToSitemap($posts)
        {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, 'http://www.lindaikejisblog.com/clear/cache');
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $output = curl_exec($ch);
            curl_close($ch);
            
            // create new sitemap object
            $sitemap = App::make('sitemap');
            
            // get all products from db (or wherever you store them)
            // $posts = DB::table('blog_content')->where('status', "1")->orderBy('publish_date', 'DESC')->get();
            
            // counters
            $counter = 0;
            $sitemapCounter = 0;
            
            // add every product to multiple sitemaps with one sitemap index
            foreach ($posts as $post) {
                if ($counter == 30000) {
                    // generate new sitemap file
                    $sitemap->store('xml', 'sitemap-' . $sitemapCounter);
                    // add the file to the sitemaps array
                    $sitemap->addSitemap("https://www.lindaikejisblog.com/sitemap-" . $sitemapCounter . '.xml');
                    // reset items array (clear memory)
                    $sitemap->model->resetItems();
                    // reset the counter
                    $counter = 0;
                    // count generated sitemap
                    $sitemapCounter++;
                }
                
                // add product to items array
                $http_url = "https://www.lindaikejisblog.com/" . $post->year . '/' . $post->month . '/' . $post->slug . ".html";
                $sitemap->add($http_url, $post->created_at, 0.8, "daily");
                $counter++;
            }
            
            // you need to check for unused items
            if (!empty($sitemap->model->getItems())) {
                // generate sitemap with last items
                $sitemap->store('xml', 'sitemap-' . $sitemapCounter);
                // add sitemap to sitemaps array
                $sitemap->addSitemap("https://www.lindaikejisblog.com/sitemap-" . $sitemapCounter . '.xml');
                // reset items array
                $sitemap->model->resetItems();
            }
            
            // generate new sitemapindex that will contain all generated sitemaps above
            $sitemap->store('sitemapindex', 'sitemap');
            die;
        }
    }
