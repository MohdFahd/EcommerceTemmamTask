<?php

namespace App\Http\Controllers;

use App\Models\cart;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CheckoutController extends Controller
{
    public function index()
    {
        $userId = auth()->id(); // Assuming you are using authentication

        $carts = cart::where('user_id', $userId)
                    ->get()
                    ->map(function ($cart) {
                        return [
                            'id' => $cart->id,
                            'product_id' => $cart->product_id,
                            'user_id' => $cart->user_id,
                            'quantity' => $cart->quantity,
                            'name' => $cart->product->name,
                            'img' => $cart->product->img,
                            'new_price' => $cart->product->new_price,
                            'old_price' => $cart->product->old_price,
                        ];
                    });

        return Inertia::render('cart/checkOut', compact('carts') );
    }

    public function store()
    {
        dd(request()->all());
    }
}
