<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $timestamps= false;
    public $primaryKey = 'product_id';

    public function image(){
        return $this->hasOne('App\Image', 'image_id', 'image_id');
    }

    public function category(){
        return $this->hasOne('App\Categorie', 'category_id', 'product_category');
    }
}
