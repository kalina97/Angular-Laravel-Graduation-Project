<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Like extends Model
{



    public function user(){
        return $this->belongsTo(User::class);
    }

    public function product(){
        return $this->belongsTo(Product::class);
    }

    //like methods
    public function store($user_id,$product_id)
    {
        return DB::table('likes')
            ->insert([
                'user_id' => $user_id,
                'product_id' => $product_id,
                'created_at' => date('Y-m-d H:i:s')
            ]);
    }

    public function deleteLike($user_id,$product_id)
    {
        return DB::table('likes')
            ->where('likes.user_id', $user_id)
            ->where('likes.product_id', $product_id)
            ->delete();
    }
}
