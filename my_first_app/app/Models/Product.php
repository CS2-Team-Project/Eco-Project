<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function products()
{
    $products = Product::all();  
    return view('UserUI.products', compact('products'));
}

    protected $fillable = ['stock_s', 'stock_m', 'stock_l'];


     // Define relationships if needed (for example, with OrderItem)
     public function orderItems()
     {
         return $this->hasMany(OrderItem::class, 'product_id');  
     }

}



