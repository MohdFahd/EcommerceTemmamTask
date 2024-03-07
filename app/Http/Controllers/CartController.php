<?php

namespace App\Http\Controllers;

use App\Models\cart;
use App\Models\favorite;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CartController extends Controller
{

    public function index()
{
    $userId = auth()->id(); // Assuming you are using authentication

    $carts = Cart::where('user_id', $userId)
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

    return Inertia::render('cart/index', compact('carts'));
}

    public function create()
    {
        // dd(request()->all());
        $attributes = request()->validate([
            'product_id' => ['required', 'exists:products,id',],
            'user_id' => ['required', 'exists:users,id',],
            'quantity' => ['required'],
        ]);

        $existingCart = Cart::where('product_id', $attributes['product_id'])
                                    ->where('user_id', $attributes['user_id'])
                                    ->first();
        if ($existingCart === null) {
            // Cart doesn't exist, so create a new one
            Cart::create($attributes);
            return redirect()->back()->with('message', 'Cart Added');
        } else {

            // Cart already exists, so delete it
            $existingCart->delete();
            return redirect()->back()->with('message', 'Cart Removed');
        }
    }

    public function destroy($id)
    {
        $cart = cart::find($id)->delete();
        return redirect()->back()->with('message', 'Your cart item has been deleted.');
    }
}
