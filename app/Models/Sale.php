<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $fillable = [
        'customer_id','customer_name','phone','item','quantity','amount'
    ];

    public function item()
    {
        return $this->belongsTo(Product::class);
    }
}
