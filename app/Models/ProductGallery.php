<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductGallery extends Model
{
    protected $fillable = [
        'product_id','added_by','picture','caption','type'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
