<?php

namespace App;

use \App\Models\Setting;
use \App\Models\UserType;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'name',
        'user_type_id',
        'email',
        'password',
        'remember_token',
        'created_by'
    ];


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function type_u(){
        return $this->belongsTo(UserType::class, 'user_type_id', 'id');

    }

    public function setting(){
        return Setting::where('id','1')->first();
    }

    public function author(){
        return $this->belongsTo(User::class, 'created_by', 'id');
    }


}
