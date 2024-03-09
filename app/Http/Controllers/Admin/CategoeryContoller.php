<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CategoeryContoller extends Controller
{
    public function index()
    {

        $search = request()->input('search');
        $categories = Category::query()
            ->where(function ($query) use ($search) {
                $query->where('name', 'like', '%'.$search.'%');
            })
            ->paginate(5)
            ->withQueryString()
            ->through(function ($category) {
                return [
                    'id' => $category->id,
                    'name' => $category->name,
                    'description' => $category->description,
                    'img'=> $category->img,
                    'created_at' => $category->created_at->diffForHumans(),
                ];
            });
        return Inertia::render('Dashboard/category', [
            'categories' => $categories,
            'filters' => request()->only(['search']),
        ]);

    }

    public function create()
    {

        return Inertia::render('Dashboard/category/Create');
    }
}
