<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    public $timestamps= false;
    public $primaryKey = 'event_id';
    public $table= 'likes';
    protected $fillable = [
        'event_id', 'user_id',
    ];
}
