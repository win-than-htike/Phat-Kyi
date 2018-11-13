<?php

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    //
    public function index() {

        $book = Book::all();

        return response()->json([
            'code' => 200,
            'message' => 'Book Lists Successfully.',
            'data' => $book
        ]);

    }

    public function insert(Request $request) {

        $book = new Book();
        $book->title = $request->input('title');
        $book->desc = $request->input('desc');
        $book->image_url = $request->input('image_url');
        $book->save();

        return response()->json([
           'code' => 200,
           'message' => 'insert successfully.'
        ]);

    }

}
