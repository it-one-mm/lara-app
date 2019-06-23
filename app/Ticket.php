<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
//    protected $table = 'ticket';

    protected $guarded = ['id'];

    function comments() {
        return $this->hasMany('App\Comment', 'post_id');
    }
}
