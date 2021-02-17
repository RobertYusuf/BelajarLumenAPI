<?php

namespace App\Repositories\Book;

interface IBookRepository
{
    public function getBooksbyCat($category_id);
    public function getAllBook();
    public function getBookById($id);
    public function getBookIdCat($id, $category_id);
    public function createBook($request, $category_id);
    public function updateBook($request, $id, $category_id);
    public function deleteBook($id);

    public function addBookUser($id);
    public function deleteBookUser($id);
}
