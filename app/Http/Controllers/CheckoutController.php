<?php

namespace App\Http\Controllers;

use App\Models\cart;
use App\Models\order;
use App\Models\Product;
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

    public function store(Request $request)
    {
        // dd($request->carts);
        $validatedData = $request->validate([
            'Fname' => 'required|string|max:255',
            'Lname' => 'string|max:255',
            'city' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'total' => 'required|numeric',

        ]);

        $order = Order::create([
            'name' => $validatedData['Fname'] . ' ' . $validatedData['Lname'],
            'city' => $request->city,
            'address' => $request->address,
            'phone' => $request->phone,
            'total' => $request->total,
            'trackingId'=> 'Anon#'. rand(300,900),
            'zip'=> $request->zip,
            'BusinessName'=> $request->BusinessName,
            'user_id' =>$request->user_id,
        ]);
        // add the carts the is in $request->cart into order_items
        $carts = $request->carts;
        foreach ($carts as $cart ) {
            $order->order_items()->create([
                'order_id' => $order->id,
                'product_id' => $cart['product_id'],
                'quantity' => $cart['quantity'],
                'price' => $cart['new_price'],
            ]);
            $product = Product::find($cart['product_id']);
            $product->update([
                'quantity' => $product->quantity - $cart['quantity'],
            ]);
        }
        // delete the current cart
        $carts = cart::where('user_id', $request->user_id)->get();
        foreach ($carts as $cart) {
            $cart->delete();
        }
        // return redirect()->route('home')->with('message', 'Order Created');
        return redirect()->route('home')->with('message', 'Order Created');
    }
}
