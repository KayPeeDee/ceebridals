<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FrontendController extends Controller
{
    public function landingPage()
    {
        $products = Product::latest()->limit(4)->get();
        $trending = Product::where('trending', 1)->latest()->limit(4)->get();
        $featured = Product::where('featured', 1)->latest()->limit(4)->get();
        return view('frontend.landing-page', compact('products','trending','featured'));
    }

    public function aboutUs()
    {
        return view('frontend.about-us');
    }

    public function contactUs()
    {
        return view('frontend.contact-us');
    }



}
