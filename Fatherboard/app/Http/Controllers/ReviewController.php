<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'customer_id' => 'required|exists:users,id',
            'product_id'  => 'required|exists:products,id',
            'rating' => 'required|integer|min:1|max:5',
            'review' => 'required|string|max:500',
        ]);
        Review::create($validated);
        
        return redirect()->back()->with('Thank You For Your Review!');
    }
public function showReview($productId)
{
    $customer = auth()->user();
    $product = product::findOrFail($productId);
    
    return view('review',compact('customer','product'));
}
}
