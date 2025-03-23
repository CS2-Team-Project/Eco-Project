<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReviewController extends Controller{

    public function store(Request $request, $productId){
        
    $request->validate([
        'rating' => 'required|integer|min:1|max:5',
        'review' => 'nullable|string',
    ]);

    Review::create([
        'product_id' => $productId,
        'user_id' => auth()->id(),
        'rating' => $request->rating,
        'review' => $request->review,
    ]);

    return back()->with('success', 'Review submitted successfully.');
}
}
