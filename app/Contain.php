<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contain extends Model
{
    public $timestamps= false;
    public $primaryKey = 'comment_id';
    public $table = 'contain';
    protected $fillable = [
        'product_id', 'order_id', 'quantity',
    ];
}
