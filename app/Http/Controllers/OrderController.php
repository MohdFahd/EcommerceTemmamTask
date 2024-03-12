<?php

namespace App\Http\Controllers;

use App\Models\order;
use App\Models\order_item;
use Illuminate\Http\Request;
use Inertia\Inertia;

class OrderController extends Controller
{
    public function index()
    {
        $search = request()->input('search');
        $orders = order::query()
            ->where(function ($query) use ($search) {
                $query->where('name', 'like', '%'.$search.'%');
            })
            ->paginate(5)
            ->withQueryString()
            ->through(function ($order) {
                return [
                    'id' => $order->id,
                    'trackingId' => $order->trackingId,
                    'userName' => $order->name,
                    'price' => $order->total,
                    'status' => $order->status,
                    'created_at' => $order->created_at->diffForHumans(),
                ];
            });
        return Inertia::render('Dashboard/orders/index', [
            'orders' => $orders,
            'filters' => request()->only(['search']),
        ]);
    }
    public function edit(order $order)
    {
        $order = $order;
        $order_items = order_item::where('order_id', $order->id)->get();
        //map the order_items to the order
        return Inertia::render('Dashboard/orders/edit', [
        'order' => $order,
        'order_items' => $order_items->map(function ($order_item) {
            return [
                'id' => $order_item->id,
                'order_id'=> $order_item->order_id,
                'name' => $order_item->product->name,
                'img' => $order_item->product->img,
                'quantity' => $order_item->quantity,
                'price' => $order_item->price,
            ];
        })
             ]);
    }

    public function update(Request $request, order $order)
    {

        $att = $request->validate([
            'tracking_mode' => ['required','numeric'],
            'status' => ['required','string'],
        ]);

        $order->update($att);

        return redirect()->back()->with('success', 'Order updated successfully.');
    }
}
