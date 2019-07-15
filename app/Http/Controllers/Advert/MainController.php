<?php

namespace App\Http\Controllers\Advert;

use App\Http\Requests\AddAdvert;
use App\Services\Util;
use Cache;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Advert;

class MainController extends Controller
{

    public function index()
    {
        $sidebar = Advert::where('type', '0')->orderby('order', 'DESC')->paginate(15);
        $inbtw = Advert::where('type', '1')->orderby('order', 'DESC')->paginate(15);
        $background = Advert::where('type', '2')->orderby('order', 'DESC')->paginate(15);
        $fp = Advert::where('type', '3')->orderby('order', 'DESC')->paginate(15);
        $bg = Advert::where('type', '4')->orderby('order', 'DESC')->paginate(15);

        return view('pages.adverts')->with(compact('sidebar','inbtw','background','fp','bg'));
    }

    public function addAdvert()
    {
        return view('pages.post_advert');
    }

    public function addAdvertComplete(AddAdvert $request){
        $data = $request->all();
        if(!empty($data['image'])) {
            $data['image_url'] = Util::getImageCloud('image', $request);
        }
        Cache::forget('sidebar_o');
        Cache::forget('inbtw');
        Cache::forget('background');
        unset($data['image']);
        if(empty($data['order'])){
            $data['order'] = 0;
        }
        Advert::create($data);
        session()->flash('alert-info','Advert has been added');
        return redirect()->to('/adverts');
    }

    function advertClear(){
        Cache::forget('sidebar_o');
        Cache::forget('inbtw');
        Cache::forget('background');
    }

    public function editAdvert($id){
        $advert = Advert::where('id',$id)->first();
        return view('pages.e_advert')->with(compact('advert'));
    }

    public function editAdvertComplete(AddAdvert $request){
        $request_data = $request->all();
        unset($request_data['_token']);
        Cache::forget('sidebar_o');
        Cache::forget('inbtw');
        Cache::forget('background');

        if(!empty($request_data['image'])) {
            $request_data['image_url'] = $this->getImageCloud('image', $request);
        }
        unset($request_data['image']);

        Advert::where('id',$request_data['id'])->update($request_data);
        session()->flash('alert-success','Advert has been edited successfully');
        return back();
    }

    public function deleteAdvert($id = null){
        $advert = Advert::where('id',$id)->first();
        $advert->delete();
        Cache::forget('sidebar_o');
        Cache::forget('inbtw');
        Cache::forget('background');

        session()->flash('alert-success','Advert has been deleted');
        return back();
    }
}
