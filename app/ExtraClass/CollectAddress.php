<?php
/**
 * Created by PhpStorm.
 * User: RONIN-47
 * Date: 9/29/2016
 * Time: 10:07 PM
 */

namespace App\ExtraClass;


use App\District;

class CollectAddress
{
    public $districts = [] , $upazila = [];

    public function __construct()
    {
        $temp = "" ;

        $address = District::all();

        foreach ($address as $addrs)
        {
            if(strlen($addrs->district) > 0)
            {
                if($addrs->district != $temp)
                {
                    $districts[] = $addrs->district;
                    $temp = $addrs->district ;
                }
                $upazila[] = $addrs->upazila ;
            }
        }

        sort($districts);
        sort($upazila);
    }
}