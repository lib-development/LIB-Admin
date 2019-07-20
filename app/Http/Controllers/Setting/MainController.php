<?php

namespace App\Http\Controllers\Setting;

use App\Models\Setting;
use App\Http\Requests\UpdateSetting;
use App\Http\Controllers\Controller;

class MainController extends Controller
{
    public function index()
    {
        $settings = Setting::first();
        return view('pages.settings')->with(compact('settings'));
    }

    public function updateSettings(UpdateSetting $request)
    {
        $data = $request->all();
        if ($request->hasFile('blog_image')) {
            $picture = $request->file('blog_image');
            // optimize
            if (env('APP_ENV') == "local") {
                $filename  = time() . '.' . $picture->getClientOriginalExtension();

                $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";

                $path = public_path('/images/settings/');

                $request->file('blog_image')->move($path, $filename);

                $data['blog_image'] = $protocol . $_SERVER['HTTP_HOST'] . "/images/settings/" . $filename;
            }
        }
        unset($data['_token']);

        Setting::where('id', '1')->update($data);
        session()->flash('alert-info', 'Settings has been updated');
        return back();
    }
}
