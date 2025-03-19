<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;

class AdminController extends Controller
{

        public function product()
        {
            $productdata = Product::all();
            return view('admin.product', compact('productdata'));
        }
    
        public function updateProduct(Request $request, $id)
        {
            $productdata = Product::findOrFail($id);
            $productdata->price = $request->input('price');
            $productdata->stock = json_encode($request->input('stock'));
            $productdata->save();
    
            return redirect()->back()->with('success', 'Product updated successfully.');
        }
    
        public function deleteProduct($id)
        {
            $productdata = Product::findOrFail($id);
            $productdata->delete();
    
            return redirect()->back()->with('success', 'Product deleted successfully.');
        }
    }