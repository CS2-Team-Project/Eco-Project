<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OrderItem;
use Auth;
use App\Models\Order;

class CheckoutController extends Controller
{
    public function showCheckoutPage()
    {
        $user = Auth::user(); // Get the logged-in user

        // Fetch the latest order that is in 'pending' status
        $order = $user->orders()->where('status', 'pending')->latest()->first();

        if (!$order) {
            return redirect('/basket')->with('error', 'No active order found.');
        }

        // Fetch order items
        $orderItems = $order->orderItems;

        // Fetch user's shipping address
        $shippingAddress = $user->shippingAddress; // Ensure this is not null

        if (!$shippingAddress) {
            return redirect('/basket')->with('error', 'No shipping address found.');
        }

        // Calculate total price
        $totalPrice = $orderItems->sum(function($item) {
            return $item->product->price * $item->quantity;
        });

        return view('UserUI.checkout', compact('order', 'orderItems', 'totalPrice', 'shippingAddress'));
    }

    public function confirmOrder(Request $request)
    {
        $user = Auth::user();
        $order = $user->orders()->where('status', 'pending')->latest()->first();

        // Ensure the order has items before confirming
        if (!$order || $order->orderItems->isEmpty()) {
            return redirect()->route('basket')->with('error', 'You cannot confirm an empty order. Please add items to your cart.');
        }

        // Optionally, you could check if the order's status is 'pending' before proceeding
        if ($order->status !== 'pending') {
            return redirect()->route('basket')->with('error', 'This order cannot be confirmed at the moment.');
        }

        // After order is confirmed, update order status and redirect to a success page
        $order->status = 'processing';
        $order->save();

        return redirect()->route('order.success')->with('success', 'Your order has been successfully confirmed!');
    }
}
