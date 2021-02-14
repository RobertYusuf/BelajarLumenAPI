<?php

namespace App\Repositories\Book;

use App\Models\Book;
use App\Models\Category;
use App\Repositories\Book\IBookRepository;

class BookRepository implements IBookRepository
{
    public function getBooks()
    {
        return Book::all();
    }

    public function getBookId($id)
    {
        $bookId = Book::find($id);
        return response()->json($bookId);
    }

    public function createBook($request, $category_id)
    {
        $categories = Category::find($category_id);

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
        // $data = new Category();
        // $data->code = $request->code;
        // $data->name = $request->name;
        // $data->save();
        // return response()->json([
        //     'message' => 'Data berhasil ditambah',
        //     'results' => $data
        // ]);
    }
}
