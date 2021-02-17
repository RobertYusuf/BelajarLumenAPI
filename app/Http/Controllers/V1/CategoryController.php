<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Repositories\Category\ICategoryRepository;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    protected $categoryRepo;

    public function __construct(ICategoryRepository $categoryRepo)
    {
        $this->categoryRepo = $categoryRepo;
        // $this->middleware('auth', ['except' => ['index', 'detail']]);
    }

    public function index(Request $request)
    {
        $categories = $this->categoryRepo->getCategories($request);

        return response()->json([
            "data" => $categories
        ]);
    }

    public function detail($id)
    {
        $detail = $this->categoryRepo->getCategoryDetail($id);
        return response()->json([
            "data" => $detail
        ]);
    }

    public function create(Request $request)
    {
        $data = $this->categoryRepo->createData($request);
        return response()->json([
            "data" => $data
        ]);
    }

    public function update(Request $request, $id)
    {
        $data = $this->categoryRepo->updateData($request, $id);
        return response()->json([
            "data" => $data
        ]);
    }
    public function delete($id)
    {
        $data = $this->categoryRepo->deleteData($id);
        return response()->json([
            "data" => $data
        ]);
    }
}
