<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::latest()->with('category')->get();
        $categories = Category::with('children')->whereNull('parent_id')->get();
        return Inertia::render('Home/Welcome', [
            'products' => $products->map(function ($product) {
                return [
                    'name' => $product->name,
                    'description' => $product->description,
                    'img' => $product->img,
                    'slug' => $product->slug,
                    'price' => $product->price,
                    'category' => $product->category ? $product->category->name : null
                ];
            }),
            // 'categories' => $categories,
            'categories' => $categories->map(function ($category) {
            return [
                'name' => $category->name,
                'description' => $category->description,
                'img' => $category->img,
                'parent_id'=>$category->parent_id,
                'children' => $category->children
            ];
        }),
        ]);

    }
}
