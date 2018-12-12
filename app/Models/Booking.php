<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
        'customer_id','customer_name','phone','item','receipt_number','quantity','collection_date','return_date','price','deposit','balance','added_by'
    ];

    public function items()
    {
        return $this->belongsTo(Product::class);
    }

}
