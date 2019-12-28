<?php

namespace App\Http\Controllers\ProtectedControllers;

use App\Models\AdminModels\AdminPicture;
use App\Models\AdminModels\AdminProduct;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminProductsController extends Controller
{
    public function productsIndex()
    {
        $model = new AdminProduct();
        $items = $model->getAllProducts();
        if (empty($items)) {
            abort(404);
        }
            return response()->json($items, 200);

    }

    public function getOneProduct($id)
    {
        $model = new AdminProduct();
        $items = $model->getOneProduct($id);
        if (!empty($items)) {
            return response()->json($items, 200);
        }
        return response()->json(null, 500);

    }

    public function storeProduct(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'brand_id' => 'required',
            'category_id' => 'required'
        ]);

        $modelProduct = new AdminProduct();
        $modelPicture = new AdminPicture();

        $name = $request->name;
        $description=$request->description;
        $price = $request->price;
        $brand_id = $request->brand_id;
        $category_id = $request->category_id;
        $items = $modelProduct->store($name,$description,$price,$brand_id,$category_id);


        if($items) {

            #picture
            $image=$request->file("product_image");
            $fileName = $image->getClientOriginalName();
            $fileName = time() . "_" . $fileName;
            public_path("images");
            $image->move(public_path("images"), $fileName);
            $product_id = $items;
            $insertPicture=$modelPicture->store($fileName,$product_id);
            return response()->json($insertPicture,201);
        }
        return response()->json(null,500);
    }

    public function deleteProduct(Request $request)
    {
        $id = $request->getContent();
        $product = new AdminProduct();
        $picture=new AdminPicture();
        $pictureId=$picture->getOnlyPicture($id);
        $filePath=public_path("images/" ).$pictureId->image_src;
        $delete = $product->deleteProduct($id);
        if($delete){
            unlink($filePath);
            $picture->deletePicture($id);
            return response()->json($delete, 204);
        }
        return response()->json($delete, 500);


    }

    public function updateProduct(Request $request, $id)
    {

        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'brand_id' => 'required',
            'category_id' => 'required'
        ]);


        $product = new AdminProduct();
        $picture = new AdminPicture();

        $name = $request->name;
        $description=$request->description;
        $price = $request->price;
        $brand_id = $request->brand_id;
        $category_id = $request->category_id;

        $update = $product->update($id,$name,$description,$price,$brand_id,$category_id);

        if ($update) {

            if ($request->hasFile('product_image')) {

                $image = $request->file("product_image");
                $fileName = $image->getClientOriginalName();
                $fileName = time() . "_" . $fileName;
                public_path("images/");

                try {
                    #picture

                    $image->move(public_path("images/"), $fileName);
                    $productForUpdate = $product->getOneProduct($id);
                    $productIdToStore=$productForUpdate->product_id;
                    $updatePicture = $picture->store($fileName, $productIdToStore);

                    $oldPicture = $picture->getOnePicture($id);
                    $oldPic=$oldPicture->image_id;
                    $oldPicturePath = $product->getOldPath($id);
                    $oldPath=$oldPicturePath->path;

                        $deleted=$picture->deleteProductPicture($oldPic);
                        $directory = public_path("images/");
                        unlink($directory . $oldPath);


                    return response()->json(null, 204);


                } catch (QueryException $e) {
                    \Log::error("message" . $e->getMessage());
                    return response()->json(null, 500);
                } catch (FileException $e) {
                    \Log::error("error" . $e->getMessage());
                    return response()->json(null, 422);
                }
            }
        }

    }
}
