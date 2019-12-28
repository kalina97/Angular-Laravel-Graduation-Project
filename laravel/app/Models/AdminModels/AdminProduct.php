<?php
/**
 * Created by PhpStorm.
 * User: Kale
 * Date: 14.12.2019
 * Time: 17:33
 */

namespace App\Models\AdminModels;
use Illuminate\Support\Facades\DB;

class AdminProduct
{
    public function getAllProducts()
    {
        return DB::table('products as p')
            ->join('categories as c','p.category_id','=','c.id')
            ->join('brands as b','p.brand_id','=','b.id')
            ->join('images as i','i.product_id','=','p.id')
            ->select('p.*','c.*','b.*','i.*', DB::raw("(SELECT count(*) FROM likes WHERE product_id = p.id) as likes"))
            ->get();

    }

    public function getOneProduct($id)
    {
        return DB::table('products as p')
            ->join('categories as c','p.category_id','=','c.id')
            ->join('brands as b','p.brand_id','=','b.id')
            ->join('images as i','i.product_id','=','p.id')
            ->where('p.id','=',$id)
            ->select('p.*','p.id as product_id','c.category_name as category_name','b.brand_name as brand_name','i.image_src as image_src')
            ->first();

    }

    public function store($name,$description,$price,$brand_id,$category_id)
    {
        return DB::table('products')
            ->insertGetId([
                'name' => $name,
                'description'=>$description,
                'price' => $price,
                'date_arrived' => date('Y-m-d H:i:s'),
                'brand_id' => $brand_id,
                'category_id' => $category_id,
                'created_at' => date('Y-m-d H:i:s')

            ]);
    }

    public function deleteProduct($id)
    {
        return DB::table('products')
            ->where('id', $id)
            ->delete();
    }

    public function update($id,$name,$description,$price,$brand_id,$category_id)
    {
        $updated = [
            'name' => $name,
            'description'=>$description,
            'price' => $price,
            'date_arrived' => date('Y-m-d H:i:s'),
            'brand_id' => $brand_id,
            'category_id' => $category_id,
            'updated_at' => date('Y-m-d H:i:s')
        ];

        return DB::table('products')
            ->where('id', $id)
            ->update($updated);
    }


    public function getOldPath($id)
    {
        return DB::table('products as p')
            ->join('images as i', 'i.product_id', '=', 'p.id')
            ->where('i.product_id', $id)
            ->select('i.image_src as path')
            ->first();
    }

}