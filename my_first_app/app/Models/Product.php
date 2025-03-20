<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function products()
{
    $products = Product::all();  //any ref to  products table should be $products
    return view('UserUI.products', compact('products'));
}

    protected $fillable = ['stock_s', 'stock_m', 'stock_l'];

}
