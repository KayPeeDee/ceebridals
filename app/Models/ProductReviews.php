<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class ProductReviews extends Model
{
    protected $fillable = [
        'reviewee','full_name','email','phone','comments','favourites','ratings'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function reviewee()
    {
        return $this->belongsTo(User::class);
    }
}
