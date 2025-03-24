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
    
        // Get the size from the request
        $size = $request->size;
    
        // Check if the product with the given size already exists in the order
        $orderItem = OrderItem::where('order_id', $order->id)
                              ->where('product_id', $product->id)
                              ->where('size', json_encode(['size' => $size])) // Compare the JSON size
                              ->first();
    
        // If the product is already in the basket with the same size, increment the quantity
        if ($orderItem) {
            $orderItem->quantity += 1;  // Increase the quantity by 1
            $orderItem->save();
        } else {
            // If the product is not in the basket with the same size, add a new row with quantity 1
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $product->id,
                'quantity' => 1,
                'price' => $product->price,
                'size' => json_encode(['size' => $size])  // Store size as JSON
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
            ->with('orderItems.product')
            ->first();
        
        // Ensure orderItems is an array
        $orderItems = $order ? $order->orderItems : [];
        
        // Decode the JSON size into a PHP array or object
        foreach ($orderItems as $orderItem) {
            $orderItem->decoded_size = json_decode($orderItem->size, true);  // Decode JSON size
        }
        
        return view('UserUI.basket', ['orderItems' => $orderItems]);
    }
    


    public function deleteItem($itemId)
    {
        // Find the order item by its ID
        $orderItem = OrderItem::findOrFail($itemId);

        // Delete the order item from the database
        $orderItem->delete();

        // Redirect back to the basket with a success message
        return redirect()->route('checkout')->with('success', 'Item removed from your basket.');
    }


    public function confirmOrder(Request $request)
{
    // Retrieve the user's order with the "pending" status
    $order = Order::where('user_id', auth()->id())
                  ->where('status', 'pending')
                  ->first();

    // Check if the order exists
    if ($order) {

        // Update order status
        $order->status = 'processing';
        $order->save();

        // Loop through order items, update stock, and delete order items
        foreach ($order->orderItems as $orderItem) {
            $product = $orderItem->product;

            // Decode size before comparison
            $decodedSize = json_decode($orderItem->size, true)['size'];

            // Deduct stock based on the ordered size
            switch ($decodedSize) {
                case 'S':
                    $product->stock_s -= $orderItem->quantity;
                    break;
                case 'M':
                    $product->stock_m -= $orderItem->quantity;
                    break;
                case 'L':
                    $product->stock_l -= $orderItem->quantity;
                    break;
            }

            // Save the updated product stock
            $product->save();
        }

        // After processing, delete order items to clear the basket
        $order->orderItems()->delete();

        // Return confirmation view with updated order details
        return view('UserUI.confirmation', [
            'order' => $order,
            'message' => 'Your order is being processed!'
        ]);
    } else {
        
        // Handle case when no pending order is found
        return redirect()->route('basket')->with('error', 'No pending order found.');
    }
}

}