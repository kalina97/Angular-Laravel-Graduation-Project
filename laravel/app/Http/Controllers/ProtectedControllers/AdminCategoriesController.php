<?php

namespace App\Http\Controllers\ProtectedControllers;

use App\Models\AdminModels\AdminCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminCategoriesController extends Controller
{

    public function categoriesIndex(){
        $model=new AdminCategory();
        $items=$model->getAllCategories();
        if (!empty($items)) {
            return response()->json($items, 200);
        }
        return response()->json($items, 500);
    }

    public function categoryStore(Request $request){
        $rules = [
            'category_name' => 'required'
        ];
        $message = [];
        $validator = \Validator::make($request->all(), $rules, $message);
        $validator->validate();
        $category_name=$request->category_name;
        $model=new AdminCategory();

        try {
            $items = $model->storeCategory($category_name);
            return response()->json($items, 201);
        } catch (\Exception $e) {

            \Log::error('message' . $e->getMessage());
        }
    }

    public function categoryDelete(Request $request)
    {
        $id = $request->getContent();
        $model = new AdminCategory();
        try {
            $items = $model->deleteCategory($id);
            return response()->json($items, 204);
        } catch (Exception $e) {
            \Log::error('message' . $e->getMessage());
        }
    }

}
