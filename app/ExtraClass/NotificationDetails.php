<?php
/**
 * Created by PhpStorm.
 * User: RONIN-47
 * Date: 10/1/2016
 * Time: 1:32 PM
 */

namespace App\ExtraClass;


use App\Book;
use App\User;

class NotificationDetails
{
    public $other_name , $book_name, $other_id, $book_id , $id , $mail ;

    function __construct($ntf)
    {
        $user = User::findOrfail($ntf->target);
        $this->other_name = $user->name ;
        $this->book_id = $ntf->book_id ;
        $this->other_id = $ntf->target ;
        $this->id = $ntf->id ;
        $this->mail = $user->email ;

        $book = Book::findOrfail($ntf->book_id);
        $this->book_name = $book->name ;

        $temp = $book->name ;
        $len = strlen($this->other_name) ;
        $tem = "" ;


        for($i =0 ; $i<strlen($temp) ; $i++)
        {
            if($i + $len > 55) {
                break;
            }
            $tem .= $temp[$i] ;
        }

        $tem .= ". . ." ;

        $this->book_name = $tem ;
    }
}