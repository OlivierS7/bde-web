<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public $timestamps= false;
    public $primaryKey = 'order_id';
    protected $fillable = [
        'order_id', 'user_id', 'order_date',
    ];

    public function products()
    {
        return $this->belongsToMany('App\Product', 'contain', 'product_id', 'order_id');
    }
}
