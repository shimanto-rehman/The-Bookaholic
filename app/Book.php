<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    //

    protected  $fillable = ['name','author','category','description'] ;
    //protected  $guarded = ['user_id'];

    function  user()
    {
        $this->hasOne('App\User');
    }
}
