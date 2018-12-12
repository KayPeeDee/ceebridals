<?php

namespace App\Http\Controllers\Backend;

use App\Models\ProductCategory;
use App\Models\ProductVariation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use App\Models\Product;

class ProductsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $categories = ProductCategory::latest()->get();
        $products = Product::latest()->get();
        //dd($products);
        return view('backend.products', compact('categories','products'));
    }

    public function addProduct(Request $request){
        $productInput = $request->except('main_picture');
        if ($request->hasFile('main_picture')){
            $image = $request->file("main_picture");
            $filename = time().'.'.$image->getClientOriginalExtension();
            $location = storage_path('app/public/'.$filename);
            Image::make($image)->resize(300,300)->save($location);

            $productInput['main_picture']  = $filename;
        }

        Product::create($productInput);

        return back();
    }

    public function showProduct($id)
    {
        $product = Product::find($id);
        return view('backend.product-detail', compact('product'));
    }


    public function addProductVariation(Request $request)
    {
        $productInput = $request->except('picture');
        if ($request->hasFile('picture')){
            $image = $request->file("picture");
            $filename = time().'.'.$image->getClientOriginalExtension();
            $location = storage_path('app/public/'.$filename);
            Image::make($image)->resize(300,300)->save($location);

            $productInput['picture']  = $filename;
        }

        ProductVariation::create($productInput);

        return back();

    }

    public function categories()
    {
        $categories = ProductCategory::latest()->get();
        return view('backend.product-categories', compact('categories'));
    }
    
    public function addCategory(Request $request)
    {
        ProductCategory::create($request->all());
        return back();
    }
}
