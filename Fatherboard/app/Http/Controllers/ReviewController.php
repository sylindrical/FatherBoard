<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\Product;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
class ReviewController extends Controller
{
    public function store(Request $request)
    {
        try{
        $validated = $request->validate([
            'customer_id' => 'nullable|exists:users,id',
            'product_id'  => 'required|exists:products,id',
            'rating' => 'required|integer|min:1|max:5',
            'review' => 'required|string|max:500',
        ]);

            DB::enableQueryLog();

        $review = new Review($validated);
        $review->save();

        Log::info('Executed Queries:', DB::getQueryLog());

        return redirect()->back()->with('success','Thank You For Your Review!');
             } catch (\Exception $e) {
                Log::error('Error saving review:' . $e->getMessage());
                return redirect()->back()->withErrors(['msg' =>'Failed to submit Review']);

             }
    }
public function create()
{
    $products = Product::all();

    return view('review',['products'=>$products]);

}

    public static function show()
    {
        $product = request("product_id");
        $info = Review::where("product_id",$product)->first();

        $data = ["product"=>$info];
        return json_encode($data);
    }

    public static function add()
    {
        $rating = request("rating");
        $review = request("review");
        $product_id = request("product_id");
        
        if ($user = AuthController::loggedIn())
        {
        $data = ["customer_id"=>$user->id,"review"=>$review, "rating"=>$rating, "product_id"=>$product_id];
        Review::create($data);

        return json_encode(["conn"=>true]);
        }
        else
        {
            return json_encode(["conn"=>false]);

        }
    }


}
