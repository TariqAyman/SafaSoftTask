<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function index()
    {
        //
        return view('cart.index');
    }

    public function addToCart($id)
    {
        $item = Item::findOrFail($id);

        Cart::updateOrInsert([
            'item_id' => $item->id,
            'user_id' => auth()->user()->id,
        ], ['quantity' => DB::raw('quantity + 1')]);

        return redirect()->back()->withSuccess('Product added to cart successfully!');
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'id' => 'required|exists:carts,id',
            'quantity' => 'required'
        ]);
        Cart::find($request->get('id'))->update([
            'quantity' => $request->get('quantity')
        ]);
        session()->flash('success', 'Cart updated successfully');
    }

    public function remove(Request $request)
    {
        $this->validate($request, [
            'id' => 'required|exists:carts,id',
        ]);
        Cart::find($request->get('id'))->delete();
        session()->flash('success', 'Product removed successfully');
    }

    public function empty_cart()
    {
        Cart::where('user_id', auth()->user()->id)->delete();
        return redirect()->route('items')->withSuccess('Products removed successfully');
    }
}
