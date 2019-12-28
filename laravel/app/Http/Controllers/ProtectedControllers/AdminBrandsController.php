<?php

namespace App\Http\Controllers\ProtectedControllers;

use App\Models\AdminModels\AdminBrand;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminBrandsController extends Controller
{
    public function brandsIndex(){
        $model=new AdminBrand();
        $items=$model->getAllBrands();
        if (!empty($items)) {
            return response()->json($items, 200);
        }
        return response()->json($items, 500);
    }

    public function brandStore(Request $request){
        $request->validate([
            'brand_name' => 'required',
            'brand_image'=> 'required|file|mimes:jpg,jpeg,png,gif|max:3000'
        ]);

        $model=new AdminBrand();
        $brand_name=$request->brand_name;
        $image=$request->file("brand_image");
        $fileName = $image->getClientOriginalName();
        $fileName = time() . "_" . $fileName;
        public_path("images");


        try {

            $image->move(public_path("images"), $fileName);


            $items = $model->storeBrand($brand_name,$fileName);
            return response()->json($items, 201);

        } catch (\Exception $e) {

            \Log::error('message' . $e->getMessage());
        }
    }

    public function brandDelete(Request $request)
    {
        $id = $request->getContent();
        $model = new AdminBrand();
        try {
            $brandId=$model->getBrandById($id);
            $filePath=public_path("images/" ).$brandId->brand_image;
            $items = $model->deleteBrand($id);
            if($items){
                unlink($filePath);
            }
            return response()->json($items, 204);
        } catch (Exception $e) {
            \Log::error('message' . $e->getMessage());
        }
    }
}
