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


     // Define relationships if needed (for example, with OrderItem)
     public function orderItems()
     {
         return $this->hasMany(OrderItem::class, 'product_id');  // assuming 'product_id' is the foreign key in order_items
     }
     public function reviews()
{
    return $this->hasMany(Review::class);
}

public function averageRating()
{
    return $this->reviews()->avg('rating');
}

}



