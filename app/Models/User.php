<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{

    /**
     * Generated
     */

    protected $table = 'users';
    protected $fillable = ['id', 'name', 'user_type_id', 'email', 'password', 'remember_token', 'created_by', 'image_url'];


    public function userType()
    {
        return $this->belongsTo(\App\Models\UserType::class, 'user_type_id', 'id');
    }

    public function blogContents()
    {
        return $this->hasMany(\App\Models\BlogContent::class, 'author', 'id');
    }

    public function author()
    {
        return $this->belongsTo(\App\Models\User::class, 'created_by', 'id');
    }
}
