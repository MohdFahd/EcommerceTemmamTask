<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CategoryController extends Controller
{
    public function show(Category $category)
    {
        // Load products associated with the category
        $category = $category->load('products');
        // Pass the category with its products to the view
        return Inertia::render('Product/index', [
            'category' => $category
        ]);
    }
}
