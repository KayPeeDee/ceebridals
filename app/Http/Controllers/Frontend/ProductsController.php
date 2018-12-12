<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductsController extends Controller
{
    public function products()
    {
        $products = Product::all();
        $categories = ProductCategory::all();
        //dd($products);
        return view('frontend.products', compact('products','categories'));
    }

    public function product($id)
    {
        $product = Product::find($id);
        return view('frontend.product-detail',compact('product'));
    }


}
