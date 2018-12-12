<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Booking;

class BookingsController extends Controller
{
   public function __construct()
   {
       $this->middleware('auth:admin');
   }

   public function bookings()
   {
       $items = Product::all();
       $bookings = Booking::latest()->get();
       return view('backend.bookings', compact('items','bookings'));
   }

   public function addBooking(Request $request)
   {
       $bookingData = $request->except('collection_date','return_date');
       $bookingData['collection_date'] = date('Y-m-d', strtotime($request->collection_date));
       $bookingData['return_date'] = date('Y-m-d', strtotime($request->return_date));

       Booking::create($bookingData);

       return back();
   }
}
