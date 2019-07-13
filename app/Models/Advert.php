<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Advert extends Model {

    /**
     * Generated
     */

    protected $table = 'adverts';

    //convention was changed so sorry for that
    //type == placement
    //advert_type
    protected $fillable = ['id', 'content','title', 'order', 'type','url','advert_type','image_url'];



}
