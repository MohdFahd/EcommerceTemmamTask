<?php

namespace App\Http\Controllers;

use App\Models\favorite;
use Hamcrest\Type\IsNumeric;
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
        $attributes = request()->validate([
            'product_id' => ['required', 'exists:products,id'],
            'user_id' => ['required', 'exists:users,id'],
        ]);

        $existingFavorite = Favorite::where('product_id', $attributes['product_id'])
                                    ->where('user_id', $attributes['user_id'])
                                    ->first();
        if ($existingFavorite === null) {
            // Favorite doesn't exist, so create a new one
            Favorite::create($attributes);
            return redirect()->back()->with('message', 'Favorite Added');
        } else {

            // Favorite already exists, so delete it
            $existingFavorite->delete();
            return redirect()->back()->with('message', 'Favorite Removed');
        }
    }

    public function check()
    {
        dd(request()->all());
        // $attributes = request()->validate([
        //     'product_id' => ['required', 'exists:products,id',],
        //     'user_id' => ['required', 'exists:users,id',],
        // ]);

        // favorite::create($attributes);
        // return redirect()->back()->with('message', 'Favorite Added');

    }
    public function destroy($id)
    {
        // dd($id);
        $favorite = favorite::find($id)->delete();
        // return redirect()->back()->with('message', 'Favorite Deleted');

    }
}
