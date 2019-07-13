<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BlogContentView extends Model {

    /**
     * Generated
     */

    protected $table = 'blog_content_views';
    protected $fillable = ['id', 'blog_contents', 'views'];


    public function blog_content(){
        return $this->belongsTo(BlogContent::class,'blog_contents','id');
    }
}
