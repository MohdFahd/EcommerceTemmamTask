<?php

namespace App\Http\Controllers;

use App\Models\favorite;
use Illuminate\Http\Request;
use Inertia\Inertia;

class FavoriteController extends Controller
{


    public function index()
    {
        return Inertia::render('Favorites/index');
    }
    public function create()
    {
        // dd(request()->all());
        $attributes = request()->validate([
            'product_id' => ['required', 'exists:products,id',],
            'user_id' => ['required', 'exists:users,id',],
        ]);

        favorite::create($attributes);
        return redirect()->back()->with('message', 'Favorite Added');

    }
    public function destroy($id)
    {

        $favorite = favorite::find($id)->delete()->with;
        // return redirect()->back()->with('message', 'Favorite Deleted');

    }
}
