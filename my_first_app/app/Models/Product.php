<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function index()
{
    $productdata = Product::all(); 
    return view('UserUI.products', compact('productdata'));
}
}
