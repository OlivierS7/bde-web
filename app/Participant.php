<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    public $timestamps= false;
    public $table= 'participate';
    protected $fillable = [
        'event_id', 'user_id',
    ];
}
