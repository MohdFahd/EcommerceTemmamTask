<?php

namespace App\Http\Controllers;

use App\Models\favorite;
use Illuminate\Http\Request;
use Inertia\Inertia;

class FavoriteController extends Controller
{
    public function create()
    {
        // dd(request()->all());
        $attributes = request()->validate([
            'product_id' => ['required'],
            'user_id' => ['required'],

        ]);

        favorite::create($attributes);



        return redirect()->back()->with('message', 'Favorite Added');

    }
}
