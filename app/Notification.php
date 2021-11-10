<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    //

    protected  $guarded = ['user_id','type','target','book_id'];

    function  user()
    {
        $this->belongsTo('App\User');
    }
}
