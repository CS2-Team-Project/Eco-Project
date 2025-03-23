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
    
        // Fetch latest order
        $order = $user->orders()->latest()->first();
    
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
        $totalPrice = $orderItems->sum(fn($item) => $item->product->price * $item->quantity);
    
        return view('UserUI.checkout', compact('order', 'orderItems', 'totalPrice', 'shippingAddress'));
    }
    
}
