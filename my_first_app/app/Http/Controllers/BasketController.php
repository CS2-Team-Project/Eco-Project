<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class BasketController extends Controller
{
    public function addToBasket(Request $request, $id)
    {
        // Fetch the logged-in user
        $user = auth()->user();

        // Get the product from the products table
        $product = Product::find($id);

        // Check if the product exists
        if (!$product) {
            return response()->json(['message' => 'Product not found!'], 404);
        }

        // Get the selected size from the request
        $selectedSize = $request->input('size');

        // Validate that a size has been selected
        if (!$selectedSize) {
            return redirect()->back()->with('error', 'Please select a size before adding to the basket.');
        }

        // Get the existing order for the user that is pending
        $order = Order::where('user_id', $user->id)->where('status', 'pending')->first();

        // If no pending order exists, create a new one
        if (!$order) {
            $order = Order::create([
                'user_id' => $user->id,
                'shipping_address_id' => 1, // Placeholder address ID (you'll change this based on the user's shipping address later)
                'status' => 'pending',
                'total_amount' => 0 // We'll update the total later
            ]);
        }

        // Check if the product with the selected size is already in the order
        $orderItem = OrderItem::where('order_id', $order->id)
                              ->where('product_id', $product->id)
                              ->where('size', $selectedSize) // Check the selected size
                              ->first();

        // If the product with selected size is already in the basket, increment the quantity
        if ($orderItem) {
            $orderItem->quantity += 1;  // Increase the quantity by 1
            $orderItem->save();
        } else {
            // If the product is not in the basket, add it with quantity 1
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $product->id,
                'quantity' => 1,
                'price' => $product->price,
                'size' => $selectedSize // Store the selected size
            ]);
        }

        // Optionally, update the total amount of the order
        $order->total_amount = $order->orderItems->sum(function($item) {
            return $item->price * $item->quantity;
        });
        $order->save();

        // Redirect to the products page with a success message
        return redirect()->back()->with('message', 'Product added to basket successfully!');
    }

    public function viewBasket()
    {
        $user = Auth::user();
    
        $order = Order::where('user_id', $user->id)
            ->where('status', 'pending')
            ->with('orderItems.product') // Load the product details
            ->first();
    
        // Ensure orderItems is an array
        $orderItems = $order ? $order->orderItems : [];
    
        return view('UserUI.basket', ['orderItems' => $orderItems]);
    }
}
