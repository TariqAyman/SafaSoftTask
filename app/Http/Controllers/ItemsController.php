<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemsController extends Controller
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
        $items = Item::paginate(8);
        return view('item.index', compact('items'));
    }

    public function search(Request $request)
    {
        if (!empty($request->get('query'))) {
            $query = $request->get('query');
            $items = Item::where('name', 'LIKE', "%{$query}%")
                ->paginate(4);
        } else {
            $items = Item::paginate(8);
        }
        return view('item.list', compact('items'));
    }
}
