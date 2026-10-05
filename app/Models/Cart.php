<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $primaryKey = 'cart_id';

    protected $fillable = [
        'ch_id',
        'name',
        'price',
        'quantity',
        'totalPrice',
    ];

    public function checkout()
    {
        return $this->belongsTo(Checkout::class, 'ch_id', 'checkout_id');
    }
}