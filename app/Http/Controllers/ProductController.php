<?php

namespace App\Http\Controllers;

use App\Models\BuyingOffer;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::latest()->with('category','productimg')->get();
        $buyingOffers = BuyingOffer::latest()->with('product')->get();
        $categories = Category::with('children')->whereNull('parent_id')->get();
        $categoryProductCounts = Category::leftJoin('products', 'categories.id', '=', 'products.category_id')
        ->selectRaw('categories.id, COUNT(products.id) as product_count')
        ->whereNull('categories.parent_id')
        ->groupBy('categories.id')
        ->get()
        ->keyBy('id')
        ->map->product_count;
        return Inertia::render('Home/Welcome', [
            'products' => $products->map(function ($product) {
                return [
                    'name' => $product->name,
                    'description' => $product->description,
                    'img' => $product->img,
                    'slug' => $product->slug,
                    'old_price' => $product->old_price,
                    'new_price' => $product->new_price,
                    'category' => $product->category ? $product->category->name : null,
                    'productimg' => $product->productimg,
                ];
            }),
            // 'categories' => $categories,
            'categories' => $categories->map(function ($category) use ($categoryProductCounts) {
                return [
                    'name' => $category->name,
                    'description' => $category->description,
                    'img' => $category->img,
                    'parent_id' => $category->parent_id,
                    'children' => $category->children,
                    'product_count' => $categoryProductCounts->get($category->id, 0)
                ];
            }),
            'buyingOffers' => $buyingOffers,
    ]);
    }
    public function display(Product $product)
    {
        $product = $product->load('productimg');
        // Pass the category with its products to the view
        return Inertia::render('Product/product_details', [
            'product' => $product
        ]);
    }

}
