<?php

namespace App\Http\Controllers\Backend;

use App\Models\Product;
use App\Models\Sale;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SalesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function sales()
    {
        $items = Product::latest()->get();
        $sales = Sale::latest()->get();
        return view('backend.sales-book', compact('items','sales'));
    }

    public function addSale(Request $request)
    {
        Sale::create($request->all());
        return back();
    }
}
