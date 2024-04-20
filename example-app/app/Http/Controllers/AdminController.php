<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;
use App\Models\Book;
use App\Models\Borrow;



class AdminController extends Controller
{
    public function index()
    {
        if (Auth::id()) {
            $user_type = Auth()->user()->usertype;

            if ($user_type == 'admin') {
                return view('admin.index');
            } else if ($user_type == 'user') {
                $data = Book::all();
                return view('home.index', compact('data'));
            }
        } else {
            return redirect()->back();
        }
    }

    public function category_page()
    {
        $data = Category::all();
        return view('admin.category', compact('data'));
    }

    public function add_category(Request $request)
    {
        $data = new Category;
        $data->cat_title = $request->category;
        $data->save();
        return redirect()->back()->with('message', 'Adding Successfull');
    }

    public function cat_delete($id)
    {
        $data = Category::find($id);
        $data->delete();
        return redirect()->back();
    }
    public function add_books()
    {
        $data = Category::all();
        return view('admin.add_books', compact('data'));
    }
    public function store_book(Request $request)
    {
        $data = new Book;
        $data->title = $request->book_name;
        $data->author_name = $request->author_name;

        $data->price = $request->price;

        $data->quantity = $request->quantity;

        $data->description = $request->description;

        $data->category_id = $request->category;
        $book_image = $request->book_img;

        if ($book_image) {
            $book_image_name = time() . '.' . $book_image->getClientOriginalExtension();
            $request->book_img->move('book', $book_image_name);
            $data->book_img =   $book_image_name;
        }


        $data->save();
        return redirect()->back();
    }

    public function show_books()
    {
        $book = Book::all();

        return view('admin.show_books', compact('book'));
    }

    public function book_delete($id)
    {
        $data = Book::find($id);
        $data->delete();
        return redirect()->back()->with('message', 'Deleted Successffully');
    }

    public function edit_book($id)
    {
        $data = Book::find($id);
        $category = Category::all();
        return view('admin.edit_book', compact('data', 'category'));
    }
    public function update_book(Request $request, $id)
    {
        $data = Book::find($id);
        $data->title = $request->title;
        $data->author_name = $request->author_name;
        $data->price = $request->price;
        $data->quantity = $request->quantity;
        $data->description = $request->description;
        $data->category_id = $request->category;
        $data->title = $request->title;
        $book_image = $request->book_img;

        if ($book_image) {
            $book_image_name = time() . '.' . $book_image->getClientOriginalExtension();
            $request->book_img->move('book', $book_image_name);
            $data->book_img =   $book_image_name;
        }
        $data->save();
        return redirect('/show_books');
    }

    public function borrow_request()
    {
        $data = Borrow::all();
        return view('admin.borrow_request', compact('data'));
    }
    public function approve_book($id)
    {
        $data = Borrow::find($id);
        $status = $data->status;
        if ($status == 'Approved') {
            return redirect()->back();
        } else {
            $data->status = 'Approved';
            $data->save();

            $bookid = $data->book_id;
            $book = Book::find($bookid);
            $book_q = $book->quantity - '1';
            $book->quantity = $book_q;
            $book->save();


            return redirect()->back();
        }
    }
    public function return_book($id)
    {
        $data = Borrow::find($id);
        $status = $data->status;
        if ($status == 'Returned') {
            return redirect()->back();
        } else {
            $data->status = 'Returned';
            $data->save();

            $bookid = $data->book_id;
            $book = Book::find($bookid);
            $book_q = $book->quantity + '1';
            $book->quantity = $book_q;
            $book->save();


            return redirect()->back();
        }
    }
    public function rejected_book($id){
        $data = Borrow::find($id);
        $data->status = 'Rejected';
        $data->save();
        return redirect()->back();

    }
}
