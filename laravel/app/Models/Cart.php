<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Models\Checkout;


class Cart extends Model
{

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function product(){
        return $this->belongsTo(Product::class);
    }

    public function checkouts(){
        return $this->hasMany(Checkout::class);
    }

    # add items to cart
    public function addToCart($user_id,$product_id,$quantity) {
        return DB::table('carts')
            ->insert([
                'user_id' => $user_id,
                'product_id' => $product_id,
                'quantity' => $quantity,
                'created_at' => date('Y-m-d H:i:s')
            ]);
    }

    # list of items from logged user cart
    public function getUserCart($user_id) {
        return DB::table('carts as c')
            ->join('users as u', 'c.user_id', '=', 'u.id')
            ->join('products as p', 'c.product_id', '=', 'p.id')
            ->join('images as i', 'i.product_id', '=', 'p.id')
            ->where('c.user_id','=', $user_id)
            ->select('c.*', 'p.name as name', 'p.price as price', 'i.image_src as picture')
            ->get();
    }

    # method to see one item
    public function getOneItem($id)
    {
        return DB::table('carts as c')
            ->join('users as u', 'c.user_id', '=', 'u.id')
            ->join('products as p', 'c.product_id', '=', 'p.id')
            ->join('images as i', 'i.product_id', '=', 'p.id')
            ->where('c.id', $id)
            ->select('c.*', 'p.name as name', 'p.price as price', 'i.image_src as picture')
            ->first();
    }

    # method to delete item from cart
    public function deleteUserItem ($id) {
        return DB::table('carts')
            ->delete($id);
    }

    # method to update item in cart
    public function updateUserItem($id,$quantity) {
        return DB::table ('carts')
            ->where('id', $id)
            ->update([
                'quantity' => $quantity
            ]);
    }


    # checkout methods
    public function checkoutSelect($id)
    {
        return DB::table('carts as c')
            ->join('products as p', 'c.product_id', '=', 'p.id')
            ->join('images as i', 'i.product_id', '=', 'p.id')
            ->where('user_id', $id)
            ->select('c.id as cart_id','c.user_id as user_id', 'c.product_id as product_id', 'c.quantity as quantity', 'p.price as price', 'i.image_src as picture', 'p.name as name')
            ->get();
    }

    public function checkoutDelete($id)
    {

        return DB::table('carts')
            ->where('user_id', $id)
            ->delete();
    }



}
