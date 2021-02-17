<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Repositories\Book\IBookRepository;
use Illuminate\Http\Request;

class BookController extends Controller
{
    protected $repository;

    public function __construct(IBookRepository $repository)
    {
        $this->repository = $repository;
        // $this->middleware('auth', ['except' => ['index', 'showId', 'showBookCat', 'showIdCat']]);
    }

    public function index()
    {
        $books = $this->repository->getAllBook();

        return response()->json([
            "data" => $books
        ]);
    }
    public function showId($id)
    {
        $books = $this->repository->getBookById($id);

        return response()->json([
            "data" => $books
        ]);
    }

    public function showBookCat($category_id)
    {
        $books = $this->repository->getBooksbyCat($category_id);

        return response()->json([
            "data" => $books
        ]);
    }
    public function showIdCat($id, $category_id)
    {
        $books = $this->repository->getBookIdCat($id, $category_id);

        return response()->json([
            "data" => $books
        ]);
    }

    public function create(Request $request, $category_id)
    {
        $books = $this->repository->createBook($request, $category_id);

        return response()->json([
            "data" => $books
        ]);
    }

    public function update(Request $request, $id, $category_id)
    {
        $books = $this->repository->updateBook($request, $id, $category_id);

        return response()->json([
            "data" => $books
        ]);
    }

    public function delete($id)
    {
        $books = $this->repository->deleteBook($id);

        return response()->json([
            "data" => $books
        ]);
    }

    public function addBookUser($id)
    {
        $book = $this->repository->addBookUser($id);

        return response()->json([
            "data" => $book
        ]);
    }
    public function deleteBookUser($id)
    {
        $respon = $this->repository->deleteBookUser($id);

        return response()->json([
            "data" => $respon
        ]);
    }
}
