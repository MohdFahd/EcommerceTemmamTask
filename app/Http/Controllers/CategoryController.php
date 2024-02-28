<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Console\Application;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Inertia\Inertia;

class CategoryController extends Controller
{
    public function show()
    {
        // Load categories with their associated slugs
        $categoriesBySlug = Category::with('slug')->get()->groupBy(function ($category) {
            return $category->slug->name;
        })->map(function ($categories) {
            return $categories->map(function ($category) {
                return [
                    'name' => $category->name,
                    'description' => $category->description,
                    'img' => $category->img,
                ];
            });
        });

        return Inertia::render('Home/Welcome', [
            'categories' => $categoriesBySlug,
        ]);
    }
}
