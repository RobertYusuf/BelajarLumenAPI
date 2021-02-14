<?php

namespace App\Repositories\Book;

interface IBookRepository
{
    public function getBooks();
    public function getBookId($id);
    public function createBook($request, $category_id);
}
