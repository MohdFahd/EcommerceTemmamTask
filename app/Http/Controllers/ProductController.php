<?php

namespace App\Http\Controllers;

use App\Models\BuyingOffer;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Cache;
use Inertia\Inertia;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::where('status', 0)
        ->where('quantity', '>=', 1) // Filter where quantity is more than 1
        ->latest()
        ->with('category', 'productimg')
        ->get();

        $buyingOffers = BuyingOffer::latest()->get();
        // $categories = Category::with('children')->whereNull('parent_id')->get();
        $categoryProductCounts = Category::leftJoin('products', 'categories.id', '=', 'products.category_id')
            ->selectRaw('categories.id, COUNT(products.id) as product_count')
            ->whereNull('categories.parent_id')
            ->groupBy('categories.id')
            ->get()
            ->keyBy('id')
            ->map->product_count;
        // $buyingOffers = Cache::remember('buyingOffers', 86400, function () {
        //     return BuyingOffer::latest()->with('product')->get();
        // });
        $categories = Cache::remember('categories', 86400 , function () {
            return Category::with('children')
                ->whereNull('parent_id')
                ->get();
        });
        // $categoryProductCounts = Cache::remember('categoryProductCounts', 60, function () {
        //     return Category::leftJoin('products', 'categories.id', '=', 'products.category_id')
        //         ->selectRaw('categories.id, COUNT(products.id) as product_count')
        //         ->whereNull('categories.parent_id')
        //         ->groupBy('categories.id')
        //         ->get()
        //         ->keyBy('id')
        //         ->map->product_count;
        // });
        return Inertia::render('Home/Welcome', [
            'products' => $products->map(function ($product) {
                return [
                    'id' => $product->id,
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
            'buyingOffers' => $buyingOffers->map(function ($buyingOffers) {
                return [
                    'id'=>$buyingOffers->id,
                    'proId' => $buyingOffers->product->id,
                    'name' =>$buyingOffers->product->name,
                    'description' => $buyingOffers->product->description,
                    'img' => $buyingOffers->product->img,
                    'old_price' =>$buyingOffers->product->old_price,
                    'new_price' => $buyingOffers->product->new_price,
                    'quantity' => $buyingOffers->product->quantity,
                    'countdownSeconds' => strtotime($buyingOffers->end_date) - strtotime(now()),
                ];
            }),

    ]);
    }
    public function display(Product $product)
    {

        $product = $product->load('productimg');
        // Pass the category with its products to the view
        return Inertia::render('Product/product_details', [
            'product' => $product,
            'categoryName' => $product->category->name
        ]);
    }

}
