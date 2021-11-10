<?php

namespace App\Http\Controllers;

use App\ExtraClass\NotificationDetails;
use App\ExtraClass\ProfileDetails;
use App\Notification;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\District ;
use App\Book ;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Mockery\CountValidator\Exception;

class ProfileController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
		$this->middleware('CheckDistrict');
	}

    /**

    */

    public function  getAbout($id)
    {
        $user = Auth::user();  // edit
       
        if($user->id != $id)        // edit
            return redirect('/');   // edit
       
        return view('EditAbout');
    }
 
    public function postAbout($id,Request $req)
    {
        try
        {
            $user = User::findOrfail($id);
 
            if($id != $user->id)
                return redirect('/');
 
            $user->studies_at = $req->institution ;
            $user->details_address = $req->address ;
            $user->save();
 
            return redirect('/profile/'.$user->id);
        }
 
        catch (\Exception $ex)
        {
            return redirect('/');
        }
    }

    /* before fixing bug

	public function  getAbout()
	{
		return view('EditAbout');
	}

	public function postAbout(Request $req)
	{
		$user = Auth::user();

		$user->studies_at = $req->institution ;
		$user->details_address = $req->address ;
		$user->save();
		
		return redirect('/profile/'.$user->id);
	}

	*/

	public function paginate($array, $perPage, $pageStart=1)
	{

		$offset = ($pageStart * $perPage) - $perPage;

		return new Paginator(array_slice($array, $offset, $perPage, true), $perPage, $pageStart,
			[
				'path' => Paginator::resolveCurrentPath(),
			]
		);
	}

	function showProfile($id)
	{
		try
		{
			$t_user = User::findOrfail($id);
		}

		catch(\Exception $exp)
		{
			return "Sorry You are Looking for a Wrong Page" ;
		}

//		return $t_user->name ;
		$address = District::findOrfail($t_user->address);
		$books = Book::where('user_id',$t_user->id)->get();

		$all_books = [] ;
//		echo sizeof($books) . " " . $t_user->id;

		foreach ($books as $book) {
			$temp = "";
			$value = strlen($book->name);

			for ($i = 0; $i < strlen($book->description); $i++) {
				$temp .= $book->description[$i];

				if ($value+$i > 170)
					break;
			}

			$temp .= " . . . ";
			$book->description = $temp;

			$all_books[] = $book;
		}
//
		$user = new ProfileDetails($t_user->name,$address->district,$address->upazila,$id,$t_user->studies_at,$t_user->details_address);
		$books = $all_books;
//		$books = new \Illuminate\Pagination\LengthAwarePaginator($all_books, sizeof($all_books), 3);
		return view('profile',compact('user','books'));
//		return view('profile');
	}
	
	function  getNotification($id)
	{
		$user = Auth::user() ;

		if($id != $user->id)
			return "sorry you are not allowed to see this page" ;

		$notifications = Notification::where('user_id',$id)->orderBy('id','asc')->get() ;

		$types1 = [] ;
		$types2 = [] ;

		foreach ($notifications as $notification) {

			try
			{
				$bookffd = Book::findOrfail($notification->book_id);
			}

			catch (\Exception $ex)
			{
				continue;
			}

			if($notification->type == 1)
				$types1[] = new NotificationDetails($notification) ;

			else if($notification->type == 2)
				$types2[] = new NotificationDetails($notification) ;
		}

		return view('notification',compact('types1','types2','id'));
	}

	function back_redirect($id,$other_id,$book_id,$type)
	{
		//return redirect('/profile/1');
		if($type != 1 && $type != 2) {
			return Redirect::back();
		}
		else
		{
			if($type == 2)
			{
				$notification = new Notification ;

				$notification->user_id = $other_id ;
				$notification->target = $id ;
				$notification->book_id = $book_id ;
				$notification->type = 2 ;

				$temp = Book::findOrfail($book_id);
				$temp->status = 0 ;
				$temp->save();

				$notification->save();
			}

			$notifi = Notification::where([['book_id',$book_id],['target',$other_id]])->get();
			$php_dep = 0 ;

			foreach ($notifi as $notf) {
				$php_dep = $notf->id ;
			}

			$notification = Notification::find($php_dep);
			$notification->delete();
		}
	}
}
