<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CategoryController extends Controller
{
    public function show(Category $category)
{
    // Find the category by name
    $categoryModel = Category::where('name', $category->name)->firstOrFail();

    // Retrieve all products with the same category ID
    $products = Product::where('category_id', $categoryModel->id)->get()->map(function ($product) {
        return [
            'name' => $product->name,
            'description' => $product->description,
            'img' => $product->img,
            'old_price' => $product->old_price,
            'new_price' => $product->new_price,
            'category' => $product->category ? $product->category->name : null,
            'productimg' => $product->productimg,
        ];
    });

    // Pass the products to the Inertia view
    return Inertia::render('Product/index', [
        'products' => $products,
    ]);
}

}
