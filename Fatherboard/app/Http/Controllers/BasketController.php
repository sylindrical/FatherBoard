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
            $basket = json_decode($user->basket->items ?? '[]', true);
            $basket[$productId] = [
                'product_id' => $productId,
                'quantity' => ($basket[$productId]['quantity'] ?? 0) + $quantity,];
            
            $user->basket()->updateOrCreate([],['items'=>json_encode($basket)]);
        } else{
            $basket = session()->get('basket',[]);
            $basket[$productId] = [
                'product_id' => $productId,
                'quantity' => ($basket[$productId]['quantity'] ?? 0) + $quantity,];
            
            session()->put('basket',$basket);
        }
    return redirect()->route('basket')->with(['success','Product has been successfully added!']);
    }

//display the basket
    public function index(){

        $basket = auth()->check()
       ? json_decode(auth()->user()->basket->items ?? '[]', true) : session()->get('basket',[]); 

        return view('basket', compact('basket'));
        }
        public function update(Request $request){
            $productId = $request->input('product_id');
            $quantity = $request->input('quantity');
            if (auth()->check()){
                $user =auth()->user();
                $basket = json_decode($user->basket->items ?? '[]', true);
                if(isset($basket[$productId])){
                    $basket[$productId]['quantity'] = $quantity;
                }
                $user->basket()->updateOrCreate([], ['items'=> json_encode($basket)]);
            }else{
$basket = session()->get('basket',[]);
if(isset($basket[$productId])){
    $basket[$productId]['quantity'] = $quantity;
}
session()->put('basket',$basket);
}
return redirect()->route('basket.index')->with('success','Basket Updated!');
        }
   
        
}

