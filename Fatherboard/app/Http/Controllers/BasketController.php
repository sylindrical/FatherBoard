<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BasketController extends Controller
{
    public function add(Request $request)
    {
        $productId = $request->input('product_id');
        $quantity = $request->input('quantity');

// make it so that if a user is logged in it will save basket
         if(auth()->check()){    
            $user = auth()->user();
            $basket = $user->basket ?:['items' =>[]];
            $basket['items'][$productId] = ['product_id'=>$productId,'quantity' =>$basket['items']['quantity']?? 0+$quantity,];
            
            $user->basket()->updateOrCreate([],['items'=>json_encode($basket['items'])]);
        } else{
            $basket = session()->get('basket',[]);
            if(isset($basket[$productId])){
                $basket[$productId]['quantity'] += $quantity;
            }else{  
                $basket[$productId] = ['product_id'=> $productId, 'quantity' => $quantity];
            }
            session()->put('basket',$basket);
        }
    return response()->json(['message'=>'Product has been successfully added!'], 200);
    }
}
