<?php

namespace App\Repositories\Category;

use App\Models\Category;
use App\Repositories\Category\ICategoryRepository;

class CategoryRepository implements ICategoryRepository
{
    public function getCategories($request)
    {
        $categories = new Category;
        $code = isset($request->code) ? $request->code : null;
        if ($code != null) {
            $categories = $categories->where('code', $code);
        }
        $categories = $categories->get();
        return $categories;
    }

    public function getCategoryDetail($id)
    {
        $detail = Category::find($id);
        return response()->json($detail);
    }

    public function createData($request)
    {
        $data = new Category();
        $data->code = $request->code;
        $data->name = $request->name;
        $data->save();

        return response()->json('Berhasil Tambah Data');
    }

    public function updateData($request, $id)
    {
        $data = Category::find($id);
        $data->code = $request->code;
        $data->name = $request->name;
        $data->save();

        return response()->json($data);
    }

    public function deleteData($id)
    {
        $data = Category::where('id', $id)->first();
        $data->delete();
        return response('Berhasil Menghapus Data');
    }
}
