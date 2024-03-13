<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\order;
use App\Models\order_item;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Inertia\Response;

use function PHPSTORM_META\map;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */

     public function index()
     {
         return Inertia::render('Profile/index', [
             'user' => Auth::user(),
         ]);
     }
    public function edit(Request $request): Response
    {
        return Inertia::render('Profile/Edit', [
            'mustVerifyEmail' => $request->user() instanceof MustVerifyEmail,
            'status' => session('status'),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        // dd($request->all());
        $request->user()->fill($request->validated());

        // if ($request->user()->isDirty('email')) {
        //     $request->user()->email_verified_at = null;
        // }

        $request->user()->save();

        return Redirect::route('profile.index')->with('message', 'User updated successfully');;
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validate([
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

    public function ShowOrder()
    {
        $user_id = Auth::user()->id;
        $orders = Order::where("user_id",$user_id)->get();
        return Inertia::render('Profile/MyOrders',compact('orders'));
    }
    public function ShowOrderItem(order $order)
    {
        $order = $order;
        $order_items = order_item::where('order_id', $order->id)->get();
        //map the order_items to the order
        return Inertia::render('Profile/MyOrderItem', [
        'order' => $order,
        'order_items' => $order_items->map(function ($order_item) {
            return [
                'id' => $order_item->id,
                'order_id'=> $order_item->order_id,
                'name' => $order_item->product->name,
                'img' => $order_item->product->img,
                'new_price' => $order_item->product->new_price,
                'old_price' => $order_item->product->old_price,
                'quantity' => $order_item->quantity,
                'price' => $order_item->price,
            ];
        })
        ]);
    }
}
