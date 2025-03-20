<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;

class AdminController extends Controller
{

        public function product()
        {
            $products = Product::all();
            return view('admin.product', compact('products'));
        }
    

        public function uploadproduct(Request $request){
            // Retrieve the product using the ID
            $data = Product::find($request->product_id);
        
            // Check if the product exists
            if (!$data) {
                return redirect()->back()->with('error', 'Product not found.');
            }
        
            // Add stock instead of replacing it
            $data->stock_s += $request->stock_s ?? 0;
            $data->stock_m += $request->stock_m ?? 0;
            $data->stock_l += $request->stock_l ?? 0;
        
            // Save the updated stock values
            $data->save();
        
            // Redirect back with a success message
            return redirect()->back()->with('success', 'Stock updated successfully!');
        }
        
}