<?php

namespace App\Repositories\Book;

use App\Models\Book;
use App\Models\Category;
use App\Repositories\Book\IBookRepository;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class BookRepository implements IBookRepository
{
    public function getAllBook()
    {
        return Book::all();
    }

    public function getBookById($id)
    {
        $bookId = Book::find($id);
        return response()->json($bookId);
    }
    public function getBooksbyCat($category_id)
    {
        // return Book::all();
        try {
            $categories = Category::findOrFail($category_id);
        } catch (ModelNotFoundException $e) {
            return response('Category not found', 404);
        }
        $categories = Category::find($category_id);
        $books = $categories->books;
        return response()->json($books, 200);
    }

    public function getBookIdCat($id, $category_id)
    {
        $bookId = Book::find($id);
        try {
            $categories = Category::findOrFail($category_id);
        } catch (ModelNotFoundException $e) {
            return response('Category not found', 404);
        }

        if ($bookId->category_id != $category_id) {
            return response('Book with this category Not Found');
        }
        return $bookId;
    }

    public function createBook($request, $category_id)
    {

        $categories = Category::find($category_id);
        try {
            $categories = Category::findOrFail($category_id);
        } catch (ModelNotFoundException $e) {
            return response('Category not found', 404);
        }
        $book = new Book();
        $book->category_id = $categories->id;
        $book->name = $request->name;
        $book->description = $request->description;
        $book->year = $request->year;
        $book->save();

        return response()->json([
            'message' => 'Data berhasil ditambah',
            'results' => $book
        ]);
    }

    public function updateBook($request, $id, $category_id)
    {
        $categories = Category::find($category_id);
        $book = Book::find($id);
        try {
            $categories = Category::findOrFail($category_id);
        } catch (ModelNotFoundException $e) {
            return response('Category not found', 404);
        }
        $book->category_id = $request->category_id;
        $book->save();
        $book->name = $request->name;
        $book->description = $request->description;
        $book->year = $request->year;
        $book->save();
        return response()->json([
            'message' => 'Data berhasil diubah',
            'results' => $book
        ]);
    }

    public function deleteBook($id)
    {
        $data = Book::where('id', $id)->first();
        $datadelete = $data;
        $data->delete();
        return response([
            'message' => 'Data berhasil dihapus',
            'results' => $datadelete
        ]);
    }
}
