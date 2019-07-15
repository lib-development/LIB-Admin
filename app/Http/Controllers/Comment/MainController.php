<?php

namespace App\Http\Controllers\Comment;

use Cache;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Comment;

class MainController extends Controller
{
    public function publishedComments()
    {
        $comments = Comment::where('status', '1')->orderby('created_at', 'desc')->paginate(100);
        return view('comments.published')->with(compact('comments'));
    }

    public function moderatedComments()
    {
        $comments = Comment::where('status', '0')->orderby('created_at', 'desc')->paginate(100);
        return view('comments.moderation')->with(compact('comments'));
    }


    public function removeComment($commentId = null)
    {
        $id = encrypt_decrypt('decrypt', $commentId);
        Comment::where('id', $id)->delete();

        Cache::forget('comments');
        Cache::forget('comments1');

        // Review Later
        // $ch = curl_init("http://phplaravel-104017-295344.cloudwaysapps.com/cgi-bin/varnishcache.sh");
        // curl_setopt($ch, CURLOPT_HEADER, 0);
        // curl_setopt($ch, CURLOPT_POST, 1);
        // curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        // $output = curl_exec($ch);
        // curl_close($ch);

        session()->flash('alert-success', "Comment has been deleted");
        return back();
    }

    public function modifyComments(Request $request)
    {
        $data = $request->all();
        if (isset($data['approve'])) {
            if (isset($data['comment_id'])) {
                if (count($data['comment_id']) > 0) {
                    Comment::whereIn('id', $data['comment_id'])->update([
                        'status' => '1'
                    ]);
                }
                $message = "Comments has been approved";
            } else {
                $message = "No Comments to approved";
            }
        } else if (isset($data['decline'])) {
            if (isset($data['comment_id'])) {

                if (count($data['comment_id']) > 0) {
                    Comment::whereIn('id', $data['comment_id'])->update([
                        'status' => '2'
                    ]);
                }
                $message = "Comments has been declined";
            }
        }

        session()->flash('alert-success', $message);
        return back();
    }


    public function approveComment($commentId = null){
        $id = encrypt_decrypt('decrypt',$commentId);
        Comment::where('id',$id)->update(['status' => "1"]);
        session()->flash('alert-success',"Comment has been approved");
        return back();
    }

    public function declineComment($commentId = null){
        $id = encrypt_decrypt('decrypt',$commentId);
        Comment::where('id',$id)->delete();

        Cache::forget('comments');
        Cache::forget('comments1');

        // $ch = curl_init("http://phplaravel-104017-295344.cloudwaysapps.com/cgi-bin/varnishcache.sh");
        // curl_setopt($ch, CURLOPT_HEADER, 0);
        // curl_setopt($ch, CURLOPT_POST, 1);
        // curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        // $output = curl_exec($ch);
        // curl_close($ch);

        session()->flash('alert-success',"Comment has been deleted");
        return back();
    }
}
