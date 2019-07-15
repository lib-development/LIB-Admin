<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model {

    /**
     * Generated
     */

    protected $table = 'settings';
    protected $fillable = ['id','blog_id','name', 'description', 'number_of_post','google_token','comments','emails',"total_published","total"];



}
