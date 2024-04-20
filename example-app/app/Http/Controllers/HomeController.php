<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Borrow;
use Illuminate\Support\Facades\Auth;
use App\Models\User;




class HomeController extends Controller
{
    public function index()
    {
        $data = Book::all();
        return view('home.index',compact('data'));
    }
    public function borrow_books($id){
        $data = Book::find($id);
        $book_id = $id;
        $quantity = $data->quantity;
        if($quantity >=  '1')
        {
            if(Auth::id()){
                $user_id  = Auth::user()->id;
                $borrow = new Borrow;
                $borrow->book_id = $book_id;
                $borrow->user_id = $user_id;
                $borrow->status = 'Applied';
                $borrow->save();
                return redirect()->back();
            }
            else
            {
                return redirect('/login');
            }

        }
         else
        {
            return redirect()->back();
        }
    }

    public function book_history()
    {
        if(Auth::id())
        {
            $userid = Auth::user()->id;
            $data = Borrow::where('user_id', '=', $userid)->get();
            return view('home.book_history', compact('data'));

        }
        
    }
    public function explore()
    {
        $data = Book::all();
        return view('home.explore', compact('data'));
    }
}
