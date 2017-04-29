<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PollOptions extends Model
{
    //
    protected $fillable=[
        'title',
        'poll_id',
        'vote'
    ];
}
