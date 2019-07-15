<?php

namespace App\Http\Controllers;

use Cache;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use Illuminate\Support\Facades\Artisan;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function clear($type = null){
        Cache::forget('all_data');
        Cache::forget('all_data2');
        Cache::forget('mobile_all_data');
        Cache::forget('mobile_all_data2');
        Cache::forget('sidebar_o');
        Cache::forget('side_bar');
        Cache::forget('inbtw');
        Cache::forget('background');
        $this->purgeVanish();
        if(!$type) {
            session()->flash('alert-info', 'Website has been updated, note once you do this, the website would clear all cache and there would be a little downtime');
            return redirect()->back();
        }
    }

    public function purgeVanish(){
        $ch = curl_init("http://phplaravel-104017-295344.cloudwaysapps.com/cgi-bin/varnishcache.sh");
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $output = curl_exec($ch);
        curl_close($ch);
        return true;
    }

    public function pullData(){
        // Artisan::call('get:post');

        session()->flash('alert-success','Content has been pulled');
        return back();
    }
}
