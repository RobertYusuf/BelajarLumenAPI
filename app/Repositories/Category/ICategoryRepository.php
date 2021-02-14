<?php

namespace App\Repositories\Category;

interface ICategoryRepository
{
    public function getCategories($request);
    public function getCategoryDetail($id);

    public function createData($request);

    public function updateData($request, $id);

    public function deleteData($id);
}
