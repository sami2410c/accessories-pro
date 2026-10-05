<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Checkout extends Model
{
    protected $primaryKey = 'checkout_id';

    protected $fillable = [
        'user_name',
        'user_email',
        'user_phone',
        'user_address',
        'user_city',
        'user_state',
    ];

    public function carts()
    {
        return $this->hasMany(Cart::class, 'ch_id', 'checkout_id');
        
    }
}