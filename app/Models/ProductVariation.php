<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductVariation extends Model
{
    protected $fillable = [
        'product_id','size','size_in_words','color','picture'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
