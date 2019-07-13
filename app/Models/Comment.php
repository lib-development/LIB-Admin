<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model {

    /**
     * Generated
     */

    protected $table = 'comments';
    protected $fillable = ['id', 'comments','likes','dislikes', 'status', 'name', 'email','img_url', 'blog_content_id','parent_id'];


    public function blogContent() {
        return $this->belongsTo(\App\Models\BlogContent::class, 'blog_content_id', 'id');
    }

    public function child() {
//        return $this->hasMany(\App\Models\Comment::class, 'parent_id', 'id');
    }


}
