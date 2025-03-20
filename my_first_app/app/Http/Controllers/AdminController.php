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
    
        public function updateProduct(Request $request, $id)
        {
            $data = $request->all();

            $products = Product::findOrFail($id);
            $products->stock_s = $request->input('stock_s'); // S
            $products->stock_m = $request->input('stock_m'); // M
            $products->stock_l = $request->input('stock_l'); // L
            $products->save();

    
            return redirect()->back()->with('success', 'Product updated.');
        }
    
        public function deleteProduct($id)
        {
            $products = Product::findOrFail($id);
            $products->delete();
    
            return redirect()->back()->with('success', 'Product deleted.');
        }
    }