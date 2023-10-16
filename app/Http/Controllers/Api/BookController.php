<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;



class BookController extends Controller
{
    public function index()
    {
        $books=Book::all();

        return response()->json($books);
    }

    public function show($id)
    {
        $book=Book::find($id)->load('authors');

        return response()->json($book);
    }

    public function create(Request $request)
    {
        $data=$request->all();
        $book=Book::create($data);
        $book->authors()->sync($request->input('author_id'));

        return response()->json($book);
    }

    public function update(Request $request, $id)
    {
    $book = Book::find($id);
    if (!$book) {
        return response()->json(['error' => 'Book not found'], 404);
    }

    $book->update($request->all());
    if ($request->has('author_id')) {
        $book->authors()->sync($request->input('author_id'));
    }

    return response()->json($book);
    }

    public function delete($id) {
        $book = Book::find($id);
        $book->delete();
        return response()->json(['status'=>'book deleted!']);
    }


}
