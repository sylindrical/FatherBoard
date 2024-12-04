<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class BasketSyncLogin
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(object $event): void
    {
$user = $event->user;
$sessionBasket = session()->get('basket',[]);
if ($sessionBasket){
    $dbBasket = $user->basket ? json_decode($user->basket->items, true) : []
;
foreach($sessionBasket as $productId => $item){
    if(isset($dbBasket[$productId])){
        $dbBasket[$productId]['quantity']+= $item['quantity'];
    }else{
        $dbBasket[$productId]=$item;
    }
    }
    $user->basket()->updateOrCreate([], ['items' =>json_encode($dbBasket)]);
    session()->forget('basket');
}
}
    }

