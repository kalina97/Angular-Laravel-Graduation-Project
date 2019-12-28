<?php
/**
 * Created by PhpStorm.
 * User: Kale
 * Date: 14.12.2019
 * Time: 17:31
 */

namespace App\Models\AdminModels;
use Illuminate\Support\Facades\DB;


class AdminBrand
{

    public function getAllBrands()
    {
        return DB::table('brands')
            ->get();
    }

    public function getBrandById($id)
    {
        return DB::table('brands')
            ->where('id',$id)
            ->first();
    }

    public function deleteBrand($id)
    {
        return DB::table('brands')
            ->where('id', $id)
            ->delete();
    }

    public function storeBrand($brand_name,$brand_image)
    {
        return DB::table('brands')
            ->insertGetId([
                'brand_name' => $brand_name,
                'created_at' => date('Y-m-d H:i:s'),
                'brand_image'=> $brand_image
            ]);
    }

}