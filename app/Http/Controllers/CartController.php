<?php

namespace App\Http\Controllers;

use App\Models\cart;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CartController extends Controller
{

    public function index()
    {
        return Inertia::render('cart/index');
    }
    public function create()
    {
        // dd(request()->all());
        $attributes = request()->validate([
            'product_id' => ['required', 'exists:products,id',],
            'user_id' => ['required', 'exists:users,id',],
            'quantity' => ['required'],
        ]);

        cart::create($attributes);
        return redirect()->back()->with('message', 'cart Added');

    }
    public function destroy($id)
    {
        // dd($id);
        $cart = cart::find($id)->delete();

    }
}
