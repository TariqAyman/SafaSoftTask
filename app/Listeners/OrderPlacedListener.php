<?php

namespace App\Listeners;

use App\Events\OrderPlaced;
use App\Models\Cart;
use App\Models\Order;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\DB;

class OrderPlacedListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  $event
     * @return void
     */
    public function handle($event)
    {
        //
        Order::create([
            'user_id' => auth()->user()->id,
            'total' => auth()->user()->total_cart,
            'address' => $event->address,
            'telephone' => $event->telephone
        ]);

        auth()->user()->update([
            'store_credit' => DB::raw("store_credit - " . auth()->user()->total_cart)
        ]);

        Cart::where('user_id', auth()->user()->id)->delete();

        session()->flash('success', 'Thanks You!');
    }
}
