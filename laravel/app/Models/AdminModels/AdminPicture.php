<?php
/**
 * Created by PhpStorm.
 * User: Kale
 * Date: 17.12.2019
 * Time: 17:45
 */

namespace App\Models\AdminModels;
use Illuminate\Support\Facades\DB;

class AdminPicture
{
    public function store($image_src,$product_id)
    {
        return DB::table('images')
            ->insertGetId([
                'image_src' => $image_src,
                'image_alt' => 'image_alt',
                'product_id'=> $product_id,
                'created_at'=> date('Y-m-d H:i:s')
            ]);
    }

    public function deletePicture($id)
    {
        return DB::table('images')
            ->where('images.product_id','=',$id)
            ->delete();
    }

    public function deleteProductPicture($id)
    {
        return DB::table('images')
            ->where('images.id','=',$id)
            ->delete();
    }

    public function getOnePicture($id)
    {
        return DB::table('images')
            ->where('images.product_id', $id)
            ->select('images.id as image_id')
            ->first();
    }

    public function getOnlyPicture($id)
    {
        return DB::table('images')
            ->where('images.product_id', $id)
            ->first();
    }



    public function updatePicture($id,$image_src,$product_id){
        return DB::table('images')
            ->where('images.product_id','=',$id)
            ->update([
                'image_src' => $image_src,
                'image_alt' => 'image_alt',
                'product_id'=> $product_id,
                'updated_at'=> date('Y-m-d H:i:s')
            ]);
    }
}