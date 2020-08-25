<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckOutController extends Controller
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


    public function success()
    {
        return view('checkout.success');
    }

    public function fail()
    {
        return view('checkout.fail');
    }
}
