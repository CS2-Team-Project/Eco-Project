<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OrderItem extends Model
{
    use HasFactory;

    // Fillable properties (optional)
    protected $fillable = ['order_id', 'product_id', 'quantity', 'price'];

    // Define the relationship to Order
    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }

    // Define the relationship to Product
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}