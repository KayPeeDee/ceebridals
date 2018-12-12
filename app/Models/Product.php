<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
   protected $fillable =[
       'category','name','price','discounted_price','description','quantity_in_stock',
       'trending','featured','views','main_picture','added_by'
   ];

   public function category()
   {
       return $this->belongsTo(ProductCategory::class);
   }

   public function gallery()
   {
       return $this->hasMany(ProductGallery::class);
   }

   public function reviews()
   {
       return $this->hasMany(ProductReviews::class);
   }

   public function variations()
   {
       return $this->hasMany(ProductVariation::class);
   }

   public function bookings()
   {
       return $this->hasMany(Booking::class);
   }

   public function sales()
   {
       return $this->hasMany(Sale::class);
   }

}
