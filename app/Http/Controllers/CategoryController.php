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
        return Inertia::render('Home/Welcome', [
        'categories' => Category::get()->map(function ($category) {
            return [
                'name' => $category->name,
                'description' => $category->description,
                'img' => $category->img,
                'slug'=>$category->slug,
            ];
        }),
    ]);
    }
}
