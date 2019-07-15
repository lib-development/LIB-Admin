<?php

namespace App\Http\Controllers\Blog;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\BlogContent;
use App\Models\Token;

use App\Services\Util;

class NotificationController extends Controller
{
    public function sendUsersBlogUpdate($postId){
        $id = encrypt_decrypt('decrypt',$postId);
        $token = Token::pluck('token','id')->toArray();
        $blog_content = BlogContent::where('id',$id)->first();
        $data = [
            'title' => $blog_content->title,
            'body' => substr(strip_tags($blog_content->content),0,150),
            'image' => Util::getImage($blog_content->content)

        ];
        Util::sendPushNotification($data,$token);
        session()->flash('alert-success','Notification has been sent');
        return back();
    }
}
