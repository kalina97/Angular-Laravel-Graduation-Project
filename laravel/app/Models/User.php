<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class User extends Model
{

    public function role(){
        return $this->belongsTo(Role::class);
    }

    public function carts(){
        return $this->hasMany(Cart::class);
    }

    public function likes(){
        return $this->hasMany(Like::class);
    }

    public function checkouts(){
        return $this->hasMany(Checkout::class);
    }


    //register user
    public function register($first_name,$last_name,$email,$password,$address)
    {
        return DB::table('users')
            ->insert([
                'first_name' => $first_name,
                'last_name' => $last_name,
                'email' => $email,
                'password' => bcrypt($password),
                'address' => $address,
                'role_id' => 2,
				'created_at'=>date('Y-m-d H:i:s')
            ]);
    }


    //profile methods

    public function getUser($id)
    {
        return DB::table('users as u')
            ->join('roles as r', 'u.role_id', '=', 'r.id')
            ->where('u.id', $id)
            ->select('u.*', 'r.role_name as role_name')
            ->first();
    }

    public function getUserCheckouts($id)
    {
        return DB::table('users as u')
            ->join('checkouts as c', 'u.id', '=', 'c.user_id')
            ->join('products as p', 'c.product_id', '=', 'p.id')
            ->join('images as i', 'i.product_id', '=', 'p.id')
            ->where('u.id', $id)
            ->where('u.role_id', 2)
            ->select('u.*', 'p.name as product_name', 'p.price as price', 'c.*', 'i.image_src as picture')
            ->get();
    }


}
