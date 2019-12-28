<?php
/**
 * Created by PhpStorm.
 * User: Kale
 * Date: 14.12.2019
 * Time: 17:33
 */

namespace App\Models\AdminModels;
use Illuminate\Support\Facades\DB;


class AdminTracking
{

    public function getAllTrackings()
    {
        return DB::table('checkouts as c')
            ->join('products as p', 'c.product_id', '=', 'p.id')
            ->join('users as u', 'c.user_id', '=', 'u.id')
            ->join('images as i', 'i.product_id', '=', 'p.id')
            ->where('c.is_delivered', 0)
            ->select('u.first_name as first_name','u.last_name as last_name','u.email as email', 'c.id', 'c.quantity as quantity', 'i.image_src as picture', 'p.name as name', 'p.price as price', 'c.created_at')
            ->orderByDesc('c.created_at')
            ->get();
    }
    public function deleteTracking($id)
    {
        return DB::table('checkouts')
            ->where('id', $id)
            ->delete();
    }
    public function deleteAllTrackings()
    {
        return DB::table('checkouts')
            ->delete();
    }

    public function deliver($id)
    {
        $update = [
            'created_at' => date('Y-m-d H:i:s'),
            'is_delivered' => 1
        ];
        return DB::table('checkouts')
            ->where('id', $id)
            ->update($update);
    }

    public function getDelivered()
    {
        return DB::table('checkouts as c')
            ->join('products as p', 'c.product_id', '=', 'p.id')
            ->join('users as u', 'c.user_id', '=', 'u.id')
            ->join('images as i', 'i.product_id', '=', 'p.id')
            ->where('c.is_delivered', 1)
            ->select('u.first_name as first_name','u.last_name as last_name','u.email as email', 'c.id', 'c.quantity as quantity', 'i.image_src as picture', 'p.name as name', 'p.price as price', 'c.created_at')
            ->orderByDesc('c.created_at')
            ->get();
    }

}