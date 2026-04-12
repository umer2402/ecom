<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function checkout()
    {
        $cartItems = session()->get('cart', []);

        if (empty($cartItems)) {
            return redirect()->route('cart.index')->with('status', 'Your cart is empty.');
        }

        $user = Auth::user();
        $subtotal = collect($cartItems)->sum(function ($item) {
            return ($item['price'] ?? 0) * ($item['quantity'] ?? 0);
        });

        return view('checkout', compact('cartItems', 'subtotal', 'user'));
    }

    public function place(Request $request)
    {
        $cartItems = session()->get('cart', []);

        if (empty($cartItems)) {
            return redirect()->route('cart.index')->withErrors([
                'cart' => 'Your cart is empty.',
            ]);
        }

        $validated = $request->validate([
            'fullname' => 'required|string|max:100',
            'email' => 'required|email|max:100',
            'phone' => 'required|string|max:20',
            'address' => 'required|string|max:5000',
        ]);

        $totalAmount = collect($cartItems)->sum(function ($item) {
            return ($item['price'] ?? 0) * ($item['quantity'] ?? 0);
        });

        $orderId = DB::transaction(function () use ($validated, $cartItems, $totalAmount) {
            $orderId = DB::table('orders')->insertGetId([
                'user_id' => Auth::id(),
                'fullname' => $validated['fullname'],
                'email' => $validated['email'],
                'phone' => $validated['phone'],
                'address' => $validated['address'],
                'total_amount' => $totalAmount,
                'order_date' => now(),
                'status' => 'Pending',
            ]);

            foreach ($cartItems as $item) {
                DB::table('order_items')->insert([
                    'order_id' => $orderId,
                    'product_id' => $item['product_id'] ?? null,
                    'product_name' => $item['name'] ?? 'Product',
                    'price' => $item['price'] ?? 0,
                    'quantity' => $item['quantity'] ?? 1,
                ]);
            }

            return $orderId;
        });

        session()->forget('cart');

        return redirect()->route('orders.show', $orderId)
            ->with('success', 'Your order has been placed successfully.');
    }

    public function index()
    {
        $orders = DB::table('orders')
            ->where('user_id', Auth::id())
            ->orderByDesc('order_date')
            ->get();

        return view('orders.index', compact('orders'));
    }

    public function show(int $orderId)
    {
        $order = DB::table('orders')
            ->where('id', $orderId)
            ->where('user_id', Auth::id())
            ->first();

        if (!$order) {
            abort(404, 'Order not found.');
        }

        $items = DB::table('order_items')
            ->where('order_id', $order->id)
            ->get();

        return view('orders.show', compact('order', 'items'));
    }
}
