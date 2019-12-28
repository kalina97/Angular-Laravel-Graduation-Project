<?php
/**
 * Created by PhpStorm.
 * User: Kale
 * Date: 14.12.2019
 * Time: 17:32
 */

namespace App\Models\AdminModels;
use Illuminate\Support\Facades\DB;

class AdminCategory
{

    public function getAllCategories()
    {
        return DB::table('categories')
            ->get();
    }

    public function deleteCategory($id)
    {
        return DB::table('categories')
            ->where('id', $id)
            ->delete();
    }

    public function storeCategory($category_name)
    {
        return DB::table('categories')
            ->insert([
                'category_name' => $category_name,
                'created_at' => date('Y-m-d H:i:s')
            ]);
    }


}