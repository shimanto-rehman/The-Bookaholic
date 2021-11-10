<?php
/**
 * Created by PhpStorm.
 * User: RONIN-47
 * Date: 9/28/2016
 * Time: 4:28 PM
 */

namespace App\ExtraClass;


use App\Notification;
use App\User;
use Illuminate\Support\Facades\Auth;

class BookProfileDetails
{
    public  $description , $book_name , $book_author , $user_id , $user_name , $is_owner = false , $id , $is_requested = 0 , $status ;
    private $book  ;

    function  __construct($book)
    {
        $this->book = $book ;
    }

    function initialize()
    {
        $user = Auth::user() ;

        if($user->id == $this->book->user_id)
            $this->is_owner = true ;

        $this->book_name = $this->book->name ;
        $this->book_author = $this->book->author ;
        $this->user_id = $this->book->user_id ;
        $this->description = $this->book->description ;

        $user_details = User::findOrfail($this->user_id);

        $this->user_name = $user_details->name ;
        $this->id = $this->book->id ;
        $this->status = $this->book->status ;

        $temp = Notification::where('target',$user->id)->get() ;

        foreach ($temp as $tem)
        {
            if($tem->book_id == $this->id)
            {
                $this->is_requested = 1 ;
                break;
            }
        }
//        echo $this->is_requested ;
//        echo  sizeof($temp)." ok Man!! ".$this->is_requested." ".$this->user_id;
    }
}