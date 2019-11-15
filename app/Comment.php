<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public $timestamps= false;
    public $primaryKey = 'comment_id';
    protected $fillable = [
        'comment_content', 'event_id', 'user_id',
    ];
}
