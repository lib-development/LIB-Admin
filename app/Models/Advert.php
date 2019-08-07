<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Advert extends Model {

    /**
     * Generated
     */

    protected $table = 'adverts';

    protected $fillable = ['id', 'content','title', 'order', 'type','url','advert_type','image_url'];



}
