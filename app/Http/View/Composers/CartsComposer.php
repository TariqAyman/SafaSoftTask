<?php

namespace App\Http\View\Composers;

use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class CartsComposer
{

    /**
     * Bind data to the view.
     *
     * @param View $view
     * @return void
     */
    public function compose(View $view)
    {
        if (Auth::check()){
            $carts = Cart::where('user_id', auth()->user()->id)->get();
            $view->with('carts', $carts);
        }
    }
}
