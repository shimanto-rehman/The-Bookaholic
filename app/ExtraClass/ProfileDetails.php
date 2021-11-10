<?php

/**
 * Created by PhpStorm.
 * User: RONIN-47
 * Date: 9/27/2016
 * Time: 12:54 AM
 */

namespace  App\ExtraClass ;


use Illuminate\Pagination\Paginator;

class ProfileDetails
{
    public $name , $district , $upazila  , $id , $studies , $d_address;

    function __construct($_name,$_district,$_upazila,$_id,$studies,$d_address)
    {
        $this->d_address = $d_address ;
        $this->studies = $studies ;
        $this->id = $_id ;
        $this->name = $_name ;
        $this->district = $_district ;
        $this->upazila = $_upazila ;
        //$this->books = \Illuminate\Pagination\Paginator::make($_book,sizeof($_book),3) ;
//        $this->books = new \Illuminate\Pagination\LengthAwarePaginator($_book, sizeof($_book), 3);
//        $this->books = $_book ;
    }
}