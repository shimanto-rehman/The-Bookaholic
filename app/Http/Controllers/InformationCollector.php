<?php

namespace App\Http\Controllers;

use App\District;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use File ;

class InformationCollector extends Controller
{
    //
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    function postAddress(Request $request,$id)
    {
        $user = Auth::user();

        if($user->address != 0)
            return Redirect::back() ;

        $selected1 = $request->dstr - 1 ;
        $selected2 = $request->upz - 1 ;
        $temp = "" ;
        $is_have = -1 ;

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
        $alrt = 1 ;

        if($selected1 < 0 || $selected2 < 0)
            return view('address',compact('districts','upazila','alrt'));

        else {

            foreach ($address as $addres) {
                if ($addres->district == $districts[$selected1] && $addres->upazila == $upazila[$selected2]) {
                    $is_have = $addres->id;
                    break;
                }
            }

            if($is_have == -1)
                return view('address',compact('districts','upazila','alrt'));

        }

        $user->address = $is_have;
        $user->save();

        $new_path = "".$user->id.".jpg" ;

        if($file = $request->file('file'))
            $file->move('images/profile',$new_path);

        else
        {
            $new_path = 'images/profile/'.$new_path ;

            File::copy('images/profile/0.jpg',$new_path);
        }

        return redirect('profile/'.$id) ;
    }

    function getAddress($id)
    {
        if(Auth::user()->address != 0)
            return Redirect::back() ;

        $address = District::all();
        $temp = "" ;

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
        $alrt = 0 ;
        
        return view('address',compact('districts','upazila','alrt')) ;
    }
}
