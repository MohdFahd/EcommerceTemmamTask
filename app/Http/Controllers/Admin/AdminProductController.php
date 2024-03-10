<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Inertia\Inertia;

class AdminProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $search = request()->input('search');
        $products = Product::query()
            ->where(function ($query) use ($search) {
                $query->where('name', 'like', '%'.$search.'%');
            })
            ->paginate(5)
            ->withQueryString()
            ->through(function ($Product) {
                return [
                    'id' => $Product->id,
                    'name' => $Product->name,
                    'description' => $Product->description,
                    'category' => $Product->category->name,
                    'new_price' => $Product->new_price,
                    'img'=> $Product->img,
                    'quantity' => $Product->quantity,
                    'status' => $Product->status,
                    'created_at' => $Product->created_at->diffForHumans(),
                ];
            });
        return Inertia::render('Dashboard/products/index', [
            'products' => $products,
            'filters' => request()->only(['search']),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::get(['id', 'name']);
        return Inertia::render('Dashboard/products/create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required','string','max:255'],
            'description' => ['required','string','max:255'],
            'category_id' => ['required', 'exists:categories,id'],
            'new_price' => ['required', 'numeric'],
            // 'img' => ['required', 'image'],
            'quantity' => ['required', 'numeric'],
            'status' => ['required', 'numeric'],
        ]);

        $product = Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'category_id' => $request->category_id,
            'new_price' => $request->new_price,
            'img' => $request->img,
            'quantity' => $request->quantity,
          'status' => $request->status,
        ]);
        $image = $request->file('img');
        $filename = $image->getClientOriginalName();
        $image->move(public_path('/assets/images/products'), $filename);
        $path = "/assets/images/products/" . $filename;
        $product->update([
            'img' => $path,
        ]);
        return redirect()->route('admin.products.create')->with('message', 'Product created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return Inertia::render('Dashboard/products/edit', [
            'product' => $product,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $Product = Product::find($id);
        //delete the img from public


        if(file_exists(public_path($Product->img)))
        {
            unlink(public_path($Product->img));
        }
        $Product->delete();
        return redirect()->back()->with('message', 'Category deleted successfully');
    }
}
