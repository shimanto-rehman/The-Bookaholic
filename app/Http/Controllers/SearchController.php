<?php

namespace App\Http\Controllers;

use App\Book;
use App\District;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;

class SearchController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('CheckDistrict');
    }
    
    //

    public  $districts = [] ;
    public  $upazila = [] ;

    function showBookList()
    {
        $id_value = 0 ;
        $selected1 = -1 ;
        $selected2 = -1 ;
        $temp = "" ;
        $all_books = [] ;

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

        $msg = "Nothing to Show !!" ;

    	return view('search-page',compact('districts','upazila','msg','selected1','selected2','all_books'));
    }

    function postBookList(Request $request)
    {
        $id_value = 0 ;
        $id = -1 ;
        $selected1 = $request->dstr - 1 ;
        $selected2 = $request->upz - 1 ;
        $temp = "" ;
        $all_books = [] ;

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

        if($selected1 < 0 || $selected2 < 0)
            return redirect('/search-page');

        else {

            foreach ($address as $addres) {
                if ($addres->district == $districts[$selected1] && $addres->upazila == $upazila[$selected2]) {
                    $id = $addres->id;
                    //echo "ok" ;
                    break;
                }
            }

            if ($id == -1) {
                $msg = "District and Area not matched!";
                $selected1 = -1;
                $selected2 = -1;
                return view('search-page', compact('districts', 'upazila', 'msg', 'selected1', 'selected2', 'all_books'));
            } else {
                $users = User::where('address', $id)->get();

                foreach ($users as $user) {
                    $books = Book::where('user_id', $user->id)->get();

                    foreach ($books as $book) {

                        if($book->status == 0)
                            continue;

                        $temp = "";
                        $value = 0;

                        for ($i = 0; $i < strlen($book->description); $i++) {
                            $temp .= $book->description[$i];

                            if ($i > 110)
                                break;
                        }

                        $temp .= " . . . ";
                        $book->description = $temp;

                        $usr = User::findOrfail($book->user_id);

                        $test = $book ;
                        $test->shared_by = $usr->id ;
                        $test->shared_by_name = $usr->name ;

                        $all_books[] = $test;
                    }
                }

                $selected1++;
                $selected2++;
                $msg = "No Book For You Here !";

                return view('search-page', compact('districts', 'upazila', 'msg', 'selected1', 'selected2', 'all_books'));
            }
        }
    }

}
