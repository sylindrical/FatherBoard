<?php

namespace App\Http\Controllers;
use App\Http\Controllers\AuthController;
use App\Models\order_details;
use App\Models\Orders;
use App\Models\Product;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $AuthController = new AuthController;//Not sure if this works, attempts to check if the user is logged in.
        if(($user = $AuthController->loggedIn()) == false){
            return view('login');
        }
        $basket=session()->get('basket',[]);
        /*
            Basket is dummy data, link to real basket.
        */
        // $basket = [
        //     [
        //         'name' => 'Product 1',
        //         'product_id' => 1,
        //         'quantity' => 2
        //     ],
        //     [
        //         'name' => 'Product 2',
        //         'product_id' => 3,
        //         'quantity' => 4
        //     ],
        //     [
        //         'name' => 'Product 3',
        //         'product_id' => 2,
        //         'quantity' => 6
        //     ]
        //     ];
        return view('checkout',compact('basket'));
    }
    public function process(Request $request)
    {
        $basket=session()->get('basket',[]);
        /*
            Basket is currently dummy data, link to real basket.
        */
        // $basket = [
        //     [
        //         'id' => 1,
        //         'products_id' => 1,
        //         'quantity' => 2
        //     ],
        //     [
        //         'id' => 2,
        //         'products_id' => 3,
        //         'quantity' => 4
        //     ],
        //     [
        //         'id' => 3,
        //         'products_id' => 2,
        //         'quantity' => 6
        //     ]
        //    ];
            /*
                REQUIRED CODE TO GET USER DETAILS
            */
            $AuthController = new AuthController;
            if(($user = $AuthController->loggedIn()) == false){//Redirects to login if the user doesn't have an account
                return redirect('/login');
            }
        $order = Orders::create([
            'customer_id'=> $user['id'], //Replace 1 with $user=>id
            'order_status' => 'Pending',

        ]);

        foreach ($basket as $item)
        {
            order_details::create([
                'order_id'=> $order->id,
                'products_id'=>$item['product_id'],
                'quantity'=>$item['quantity']
            ]);
        }
        session()->forget('basket'); //Removes basket data after checkout finishes(?)

        return redirect()->route('checkout_success');
    }
    public function success(){
        return view('checkout_success');
    }
}
