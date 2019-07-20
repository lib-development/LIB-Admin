<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserType extends Model {

    /**
     * Generated
     */

    protected $table = 'user_types';
    protected $fillable = ['id', 'name'];


    public function users() {
        return $this->hasMany(\App\Models\User::class, 'user_type_id', 'id');
    }


}
