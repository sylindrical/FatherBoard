<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Basket;

class BasketController extends Controller
{
    public function add(Request $request)
    {
        $productId = $request->input('product_id');
        $quantity = $request->input('quantity', 1);




$product = Product::findOrFail($productId);

        $basket = session()->get('basket',[]);
if(isset($basket[$product->id])){
    $basket[$product->id]['quantity']+=$quantity;
}else{

                $basket[$product->id]=[
                'product_id' => $product->id,
                'name' => $product->Title,
                'price'=> $product->Price->price,
                'quantity' => $quantity,];
                }

            session()->put('basket',$basket);
$userId = $request->user()->customer_information_id->id ?? null;
        if($userId) {
            $existingBasket = Basket::where('customer_information_id',$userId)->first();

            if($existingBasket){
        $existingItems = json_decode($existingBasket->items,true) ?? [];
        foreach($basket as $itemId => $itemData){
            $existingItems[$itemId] = $itemData;
        }
        $existingBasket->update(['items'=>json_encode($existingItems)]);

            }else{
                Basket::create([
                    'customer_information_id'=> $userId, 'items'=>json_encode($basket),
                ]);
            }
        }

    return redirect()->route('basketIndex')->with(['success','Product added!']);
    }

//display the basket
    public function index(){

        $basket = session()->get('basket',[]);
        return view('basket',compact('basket'));
        }


        public function update(Request $request){
            $productId = $request->input('product_id');
            $quantity = $request->input('quantity');

                $basket = session()->get('basket',[]);
                if(isset($basket[$productId])){
                    $basket[$productId]['quantity'] = $quantity;
                }

session()->put('basket',$basket);

return redirect()->route('basketIndex')->with('success','Basket Updated!');
        }


        public function remove(Request $request){

            $productId = $request->input('product_id');
            $basket=session()->get('basket',[]);
            if (isset($basket[$productId])){
                unset($basket[$productId]);
            }
            Session()->put('basket',$basket);
            return redirect()->route('basketIndex')->with('success','Product removed!');
        }
        public function checkout(){
            $basket=session()->get('basket',[]);
                return view('checkout',compact('basket'));
        }
}
