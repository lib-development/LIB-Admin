<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BlogContent extends Model {

    /**
     * Generated
     */

    protected $table = 'blog_content';
    protected $fillable = ['id', 'title', 'slug','schedule', 'content','year','month', 'author', "tags",'status', 'views', 'comments', 'likes', 'publish_date'];


    public function author_u() {
        return $this->belongsTo(\App\Models\User::class, 'author', 'id');
    }
    public function author() {
        return $this->belongsTo(\App\Models\User::class, 'author', 'id');
    }
    public function comments_c(){
        return $this->hasMany(Comment::class,'blog_content_id','id');
    }

    public function approved_comments(){
        return $this->hasMany(Comment::class,'blog_content_id','id')->where('status',"1");
    }

    public function approved_comments_count(){
        return $this->hasMany(Comment::class,'blog_content_id','id')->where('status',"1");
    }



}
