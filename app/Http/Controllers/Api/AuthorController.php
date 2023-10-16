<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Author;


class AuthorController extends Controller
{
    public function index()
    {
        $authors=Author::all();

        return response()->json($authors);
    }

    public function show($id)
    {
        $author=Author::find($id)->load('books');

        return response()->json($author);
    }

    public function create(Request $request)
    {
        $data=$request->all();
        $author=Author::create($data);
        $author->books()->sync($request->input('book_id'));

        return response()->json($author);
    }

    public function update(Request $request, $id)
    {
    $author = Author::find($id);
    if (!$author) {
        return response()->json(['error' => 'Book not found'], 404);
    }

    $author->update($request->all());
    if ($request->has('author_id')) {
        $author->books()->sync($request->input('book_id'));
    }

    return response()->json($author);
    }

    public function delete($id) {
        $author = Author::find($id);
        $author->delete();
        return response()->json(['status'=>'author deleted!']);
    }

}
