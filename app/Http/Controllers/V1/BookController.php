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
    }

    public function index(Request $request)
    {
        $books = $this->repository->getBooks($request);

        return response()->json([
            "data" => $books
        ]);
    }
    public function showId($id)
    {
        $books = $this->repository->getBooks($id);

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
}
