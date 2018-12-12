<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrdersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function orders()
    {
        return view('backend.orders');
    }

    public function newOrder()
    {

    }

    public function fulfillOrder()
    {
        //return view();
    }
}
