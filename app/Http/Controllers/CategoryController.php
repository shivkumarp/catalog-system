<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        return response()->json([
            'data' => $categories
        ]);
    }

    public function getCategoryItems(Request $request, $slug)
    {
        $category = Category::where('slug', $slug)->first();

        if (!$category) {
            return response()->json([
                'error' => 'Category not found'
            ], 404);
        }

        // Validate query parameters
        $validator = validator($request->all(), [
            'page' => 'integer|min:1',
            'per_page' => 'integer|min:1|max:50',
            'q' => 'string|max:255',
            'min_price' => 'numeric|min:0',
            'max_price' => 'numeric|min:0',
            'sort' => 'in:price_asc,price_desc,name_asc,name_desc',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error' => 'Validation failed',
                'messages' => $validator->errors()
            ], 422);
        }

        // Check price range validity
        if ($request->has(['min_price', 'max_price']) && $request->min_price > $request->max_price) {
            return response()->json([
                'error' => 'Invalid price range: min_price cannot be greater than max_price'
            ], 400);
        }

        $perPage = $request->get('per_page', 10);
        $query = $category->items();

        // Search by item name
        if ($request->has('q') && !empty($request->q)) {
            $query->where('name', 'like', '%' . $request->q . '%');
        }

        // Price range filter
        if ($request->has('min_price')) {
            $query->where('price', '>=', $request->min_price);
        }

        if ($request->has('max_price')) {
            $query->where('price', '<=', $request->max_price);
        }

        // Sorting
        $sort = $request->get('sort', 'name_asc');
        switch ($sort) {
            case 'price_asc':
                $query->orderBy('price', 'asc');
                break;
            case 'price_desc':
                $query->orderBy('price', 'desc');
                break;
            case 'name_asc':
                $query->orderBy('name', 'asc');
                break;
            case 'name_desc':
                $query->orderBy('name', 'desc');
                break;
        }

        $items = $query->paginate($perPage);

        return response()->json([
            'category' => $category->only(['id', 'name', 'slug', 'description']),
            'items' => $items->items(),
            'pagination' => [
                'current_page' => $items->currentPage(),
                'per_page' => $items->perPage(),
                'total' => $items->total(),
                'last_page' => $items->lastPage(),
                'from' => $items->firstItem(),
                'to' => $items->lastItem(),
            ]
        ]);
    }
}
