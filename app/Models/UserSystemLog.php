<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserSystemLog extends Model {

    /**
     * Generated
     */

    protected $table = 'user_system_log';
    protected $fillable = ['id', 'user_id', 'type', 'activity', 'status', 'ip'];



}
