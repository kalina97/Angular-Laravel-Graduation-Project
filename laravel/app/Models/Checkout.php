<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Checkout extends Model
{

    public $cart_id;
    public $user_id;
    public $created_at;
    public $product_id;
    public $quantity;
    public $is_delivered;

    public function cart(){
        return $this->belongsTo(Cart::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function product(){
        return $this->belongsTo(Product::class);
    }

    public function store()
    {
        return DB::table('checkouts')
            ->insert(
                [
                    'user_id' => $this->user_id,
                    'cart_id' => $this->cart_id,
                    'product_id' => $this->product_id,
                    'quantity' => $this->quantity,
                    'is_delivered' => 0,
                    'created_at' => date('Y-m-d H:i:s')
                ]
            );
    }

}
