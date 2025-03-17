<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // Declare the fillable fields
    protected $fillable = [
        'title',
        'price',
        'product_code',
        'description',
        'quantity',  // and add 'stock_s', 'stock_m', 'stock_l' if you want to allow mass assignment for those as well
        'stock_s', 
        'stock_m', 
        'stock_l'
    ];
}