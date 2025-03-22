<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\ShippingAddress;


class ShippingAddress extends Model
{
    // We don’t need to specify the table name if it follows Laravel's conventions
    protected $fillable = [
        'user_id',         // Foreign key linking to the user
        'address_line_1',
        'address_line_2',
        'city',
        'postal_code',
        'country',
    ];

    // Define the relationship between the ShippingAddress and User models
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}