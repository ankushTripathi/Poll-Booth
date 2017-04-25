<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\PollOptions as Options;

class Poll extends Model
{
    //
    public function pooloptions()
    {
        $this->hasMany(Options);
    }
}
