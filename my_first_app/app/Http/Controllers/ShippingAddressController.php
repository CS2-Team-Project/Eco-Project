<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ShippingAddress;

class ShippingAddressController extends Controller
{
    // Method to show the create address form
 public function create()
    {
    // If you're creating a new shipping address, you can pass null.
    $shippingAddress = ShippingAddress::where('user_id', auth()->user()->id)->first(); // Example to get user's shipping address

    return view('UserUI.add_address', compact('shippingAddress'));
    }


    // Store a new address or update the existing one
    public function store(Request $request)
    {
        // Validate the incoming request
        $validated = $request->validate([
            'address_line_1' => 'required|string',
            'address_line_2' => 'nullable|string',
            'city' => 'required|string',
            'postal_code' => 'required|string',
            'country' => 'required|string',
        ]);

        // Check if the user already has an existing shipping address
        $shippingAddress = ShippingAddress::where('user_id', auth()->user()->id)->first();

        if ($shippingAddress) {
            // Update the existing address
            $shippingAddress->update($validated);
            $message = 'Address updated successfully!';
        } else {
            // Create a new address
            $validated['user_id'] = auth()->user()->id;
            ShippingAddress::create($validated);
            $message = 'Address created successfully!';
        }

        // Redirect to the checkout page after saving the address
    return redirect()->route('checkout')->with('success', $message);
    }
    
}
