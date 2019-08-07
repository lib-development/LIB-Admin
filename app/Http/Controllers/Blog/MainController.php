<?php

namespace App\Http\Controllers\Blog;

use Cache;
use DateTime;
use Illuminate\Support\Carbon;
use App\Models\BlogContent;
use App\Http\Requests\AddBlogPost;
use App\Http\Controllers\Controller;

use App\Models\Comment;

class MainController extends Controller
{
    public function showAddNewBlogPostPage()
    {
        return view('pages.AddNewBlogPost');
    }


    public function nowTime()
    {
        $date = new DateTime();
        $dateFormarted = $date->format('Y-m-d H:i:s');
        return str_replace(' ', '', str_replace(':', '', str_replace('-', '', $dateFormarted)));
    }

    public function addNewBlogPost(AddBlogPost $request)
    {
        $index = 1;
        $type = false;
        $data = $request->all();
        // dd($data);
        $data['author'] = auth()->user()->id;
        $data['content'] = utf8_encode($data['content']);
        $data['title'] = utf8_encode($data['title']);
        $data['slug'] = str_slug($data['title']) . '-'  . $this->nowTime();
        $data['schedule'] = null;

        //a switch would work but this still works
        if (isset($data['save_continue'])) {
            $data['status'] = '3';
            $type = true;
            session()->flash('alert-info', 'Content has been saved');
        } else if (isset($data['send_admin'])) {
            $data['status'] = '2';
            session()->flash('alert-info', 'Content has been sent to the Admin');
        } else if (isset($data['publish'])) {
            $data['status'] = '1';
            $data['publish_date'] = Carbon::now();
            session()->flash('alert-info', 'Content has been published');
            //generate the file now
            Cache::forget('all_data');
            Cache::forget('mobile_all_data');
            // $this->purgeVanish();
        } else {
            $data['status'] = '4';
            $data['schedule'] = Carbon::parse($data['schedule']);
            session()->flash('alert-info', 'Content has been saved');
        }
        $data['year'] = Carbon::now()->year;
        $data['month'] = Carbon::now()->month;
        // dd($data);
        $article = BlogContent::create($data);

        if ($type) {
            return redirect()->to('/post/edit/' . encrypt_decrypt('encrypt', $article->id));
        }
        return redirect()->to('/posts');
    }

    public function editPostShow($postId = null)
    {
        $id = encrypt_decrypt('decrypt', $postId);
        $article = BlogContent::where('id', $id)->first();
        return view('pages.e_article')->with(compact('article'));
    }

    public function completeEditPost(AddBlogPost $request)
    {
        $type = false;
        $data = $request->all();

        $data['content'] = utf8_encode($data['content']);
        $data['title'] = utf8_encode($data['title']);

        $blog_con = BlogContent::whereId($data['id'])->first();

        unset($data['_token']);
        $pending = false;
        //a switch would work but this still works
        if (isset($data['save_continue'])) {
            unset($data['save_continue']);
            $data['status'] = '3';
            $type = true;
            if ($blog_con->status == "4") {
                $data['status'] = '4';
            }
            session()->flash('alert-info', 'Content has been saved');
        } else if (isset($data['send_admin'])) {
            unset($data['send_admin']);
            $data['status'] = '2';
            $data['schedule'] = null;
            session()->flash('alert-info', 'Content has been sent to the Admin');
        } else if (isset($data['publish'])) {
            unset($data['publish']);
            $publish = true;
            $data['status'] = '1';
            if ($blog_con->status ==  "2") {
                $pending = true;
            }
            $data['schedule'] = null;
            if (!$blog_con->publish_date) {
                $data['publish_date'] = Carbon::now();
            }
            $data['schedule'] = null;

            session()->flash('alert-info', 'Content has been published');
        } else if (isset($data['save_continue2'])) {
            unset($data['save_continue2']);
            $back = true;
            $data['schedule'] = null;
            $data['status'] = '2';
            if ($blog_con->status == "4") {
                $data['status'] = '4';
            }
            session()->flash('alert-info', 'Content has been saved');
        } else {
            $data['status'] = '4';
            $data['schedule'] = Carbon::parse($data['schedule']);
            session()->flash('alert-info', 'Scheduled Date has been set for ' . $data['schedule']);
        }

        if (isset($data['schedule']) && !$data['schedule']) {
            unset($data['schedule']);
        }

        BlogContent::where('id', $data['id'])->update($data);

        if (isset($publish) && $publish) {
            $this->clear("1");
        }

        $article = BlogContent::where('id', $data['id'])->first();

        Cache::forget($article->slug);

        if ($type) {
            return redirect()->to('/post/edit/' . encrypt_decrypt('encrypt', $data['id']));
        }
        if ($pending) {
            return redirect()->to('/posts/approval/pending');
        }
        if (isset($back)) {
            return back();
        }

        return redirect()->to('/posts');
    }

    public function deleteAPost($postId = null)
    {
        $id = encrypt_decrypt('decrypt', $postId);
        $user = auth()->user();
        $article = BlogContent::where('id', $id)->first();
        if (($article->status != "1" && $article->author == $user->id) || $user->user_type_id == "1") {
            //check the comments
            Comment::where('blog_content_id', $article->id)->delete();
            $article->delete();

            session()->flash('alert-info', "Article has been deleted");
            Cache::forget('all_data');
            Cache::forget('all_data2');
            // $this->purgeVanish();
            return back();
        }

        session()->flash('alert-danger', "Article has could not be deleted because you dont have the right permission to do so.");
        return back();
    }


    public function pendingApproval()
    {
        $user = auth()->user();
        if ($user->user_type_id == 1) {
            $articles = BlogContent::where('status', 2)->orderby('created_at', 'desc')->paginate(50);
            $articles_count =  BlogContent::where('status', 2)->count();
        } else {
            $articles = BlogContent::where('author', $user->id)->orderby('created_at', 'desc')->where('status', 2)->paginate(50);
            $articles_count =  BlogContent::where('author', $user->id)->where('status', 2)->count();
        }

        return view('pages.pending_approval')->with(compact('articles', 'articles_count'));
    }

    public function clear($type = null)
    {
        Cache::forget('all_data');
        Cache::forget('all_data2');
        Cache::forget('mobile_all_data');
        Cache::forget('mobile_all_data2');
        Cache::forget('sidebar_o');
        Cache::forget('side_bar');
        Cache::forget('inbtw');
        Cache::forget('background');
        // $this->purgeVanish();
        if (!$type) {
            session()->flash('alert-info', 'Website has been updated, note once you do this, the website would clear all cache and there would be a little downtime');
            return redirect()->back();
        }
    }
}
