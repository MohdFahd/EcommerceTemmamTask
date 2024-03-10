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

    public function edit(Category $category)
    {
        // dd($category);
        return Inertia::render('Dashboard/category/edit', [
            'category' => $category,
        ]);
    }
    public function update(Request $request, Category $category)
    {

        // dd($request->all());
        $attributes = request()->validate([
            'name' => ['required','string','max:255'],
            'description' => ['required','string'],
            // 'img' => ['required'],
        ]);
        $image = $request->file('img');
        // check if the img is uploaded or not
        if ($image) {
            $filename = $image->getClientOriginalName();
            $image->move(public_path('/assets/images/icons'), $filename);
            $path = "/assets/images/icons/". $filename;
            $category->update([
                'name' => $request->name,
                'description' => $request->description,
                'img' => $path,
            ]);
        } else {
            $category->update([
                'name' => $request->name,
                'description' => $request->description,
            ]);
        }
        return redirect()->route('admin.categories.edit', $category->id)->with('message', 'Category updated successfully');
    }

    public function destroy($id)
    {
        $category = Category::find($id);
        //delete the img from public
        unlink(public_path($category->img));
        $category->delete();
        return redirect()->back()->with('message', 'Category deleted successfully');
    }
}
