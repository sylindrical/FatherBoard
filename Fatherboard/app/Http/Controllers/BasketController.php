<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\BasketItem;
use App\Models\Basket;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Models\CustomerInformation;

    class BasketController extends Controller
    {
        public function add(Request $request)
        {
            $productId = $request->input('product_id');
            $quantity = $request->input('quantity', 1);

            $customerId = Auth::id();
            if ($customerId) {
                Basket::updateOrCreate([
                    'customer_id' => auth::id(),
                     'items' => json_encode([
' product_id'=>'$product',
'quantity' => '1'
                     ]),
                     ]);


            }
    $product = Product::findOrFail($productId);

            $basket = session()->get('basket',[]);
    if(isset($basket[$product->id])){
        $basket[$product->id]['quantity']+=$quantity;
    }else{

                    $basket[$product->id]=[
                    'product_id' => $product->id,
                    'quantity' => $quantity,];
                    }

                session()->put('basket',$basket);

        return redirect()->route('basketIndex')->with(['success','Product added!']);
        }



//display the basket
public function index()
{
    $basket = session()->get('basket', []);

    $basketDetails = [];
    foreach ($basket as $item) {
        $product = Product::find($item['product_id']);
        if ($product) {
            $basketDetails[] = [
                'product_id' => $product->id,
                'name' => $product->Title,
                'price' => $product->Price->price,
                'quantity' => $item['quantity'],
            ];
        }
    }

    return view('basket', compact('basketDetails'));
}

public function update(Request $request)
{
    $productId = $request->input('product_id');
    $quantity = $request->input('quantity');

    $basket = session()->get('basket', []);
    if (isset($basket[$productId])) {
        $basket[$productId]['quantity'] = $quantity;
    }

    session()->put('basket', $basket);

    return redirect()->route('basketIndex')->with('success', 'Basket Updated!');
}

public function remove(Request $request)
{
    $productId = $request->input('product_id');
    $basket = session()->get('basket', []);
    if (isset($basket[$productId])) {
        unset($basket[$productId]);
    }
    session()->put('basket', $basket);

    return redirect()->route('basketIndex')->with('success', 'Product removed!');
}

public function checkout()
{
    $basket = session()->get('basket', []);

    $basketDetails = [];
    foreach ($basket as $item) {
        $product = Product::find($item['product_id']);
        if ($product) {
            $basketDetails[] = [
                'product_id' => $product->id,
                'name' => $product->Title,
                'price' => $product->Price->price,
                'quantity' => $item['quantity'],
            ];
        }
    }

    return view('checkout', compact('basketDetails'));
}
}
