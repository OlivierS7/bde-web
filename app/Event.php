<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Intervention\Image\ImageManagerStatic as ImageSize;

class Event extends Model
{
    public $timestamps= false;
    public $primaryKey = 'event_id';

    public function image(){
       return $this->hasMany('App\Image', 'event_id', 'event_id');
    }

    public function comment(){
        return $this->hasMany('App\Comment', 'event_id', 'event_id');
    }

    //public function category(){
     //   return $this->hasOne('App\Categorie', 'category_id', 'product_category');
    //}

}
