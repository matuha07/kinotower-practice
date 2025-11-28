<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(Request $request) {
        $categories = Category::all();
        return CategoryResource::collection($categories);

    }

    public function show(int $id) {
        $category = Category::find($id);
        if (!$category) {
            return response()->json([
                'message' => 'Category not found',
            ]);
        }

        return response()->json(new CategoryResource($category));
    }
}
