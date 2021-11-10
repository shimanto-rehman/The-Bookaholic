<?php

namespace App\Http\Controllers;

use App\Book;
use App\ExtraClass\BookProfileDetails;
use App\Http\Requests\AddBookRequest;
use App\Notification;
use File;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use League\Flysystem\Exception;

class BookController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('CheckDistrict');
    }
    
    /**
    
    */
    
    function showBook($id)
    {
        try
        {
            $book = Book::findOrfail($id);
        }

        catch (\Exception $exp)
        {
            return "Sorry !! You are Looking for a Wrong Page.";
        }
        
        $data = new BookProfileDetails($book);
        $data->initialize();

    	return view('book',compact('data'));
    }

    function addBook()
    {
        return view('share');
    }

    function postBook(AddBookRequest $request)
    {
        $book = new Book ;
        $user = Auth::user() ;

        $book->name = $request->name ;
        $book->author = $request->author ;
        $book->description = $request->description ;
        $book->user_id = $user->id ;
        $book->save();

        $new_path = "".$book->id.".jpg" ;

        if($file = $request->file('file'))
            $file->move('images/books',$new_path);

        else
        {
            $new_path = 'images/books/'.$new_path ;

            File::copy('images/books/0.jpg',$new_path);
        }

        return redirect('profile/'.$user->id);
    }

    function postChange($id,Request $req)
    {
        if($req->optradio == 1)
        {
            $book = Book::findOrfail($id);
            $book->status = 1 ;
            $book->save();
        }

        else if($req->optradio == 2)
        {
            $book = Book::findOrfail($id);
            $book->status = 0 ;
            $book->save();
        }

        else
        {
            $book = Book::findOrfail($id);
            $book->delete();
        }

        return redirect('/');
    }

    function postRequest($book_id,$target_id)
    {
        $notification = new Notification ;

        $notification->user_id = $target_id ;
        $notification->book_id = $book_id ;
        $user = Auth::user() ;
        $notification->target = $user->id ;
        $notification->type = 1 ;
        $notification->save();

        return redirect('/book/'.$book_id);
    }

    function back_redirect($book_id,$target_id)
    {
        return Redirect::back() ;
    }
}
