<?php

namespace App\Http\Controllers;

use App\Events\OrderPlaced;
use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function index()
    {
        //
        return view('order.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'address' => 'required',
            'telephone' => 'required|numeric|regex:/(01)[0-9]{8}/'
        ]);
        if (auth()->user()->store_credit >= auth()->user()->total_cart) {
            event(new OrderPlaced($request->get('address'), $request->get('telephone')));
            return redirect()->route('checkout.success');
        } else {
            return redirect()->route('checkout.fail');
        }
    }

}
