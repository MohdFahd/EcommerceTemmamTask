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

    public function store(Request $request)
    {
        // dd($request->all());
        $image = $request->file('img');

        $attributes = request()->validate([
            'name' => ['required','string','max:255'],
            'description' => ['required','string','max:255'],
            'img' => ['required'],
        ]);
        $filename = $image->getClientOriginalName();
        $image->move(public_path('/assets/images/icons'), $filename);
        $path = "/assets/images/icons/" . $filename;


        Category::create([
            'name' => $request->name,
            'description' => $request->description,
            'img' => $path,
        ]);


        return redirect()->route('admin.categories.create')->with('message', 'Category created successfully');
    }
}
