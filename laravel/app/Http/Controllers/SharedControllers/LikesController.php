<?php

namespace App\Http\Controllers\SharedControllers;

use App\Models\Like;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class LikesController extends Controller
{
    public function like(Request $request)
    {
        $model = new Like();
        $model->product_id = $request->product_id;
        $model->user_id = $request->user_id;
        $userId = $request->user_id;
        $productId = $request->product_id;
        $count = DB::table('likes')->where('user_id', $model->user_id)->where('product_id', $model->product_id)->count();
        if($count > 0) {
            $model->deleteLike($userId, $productId);
            return response()->json(null, 204);
        }
        else{
            $items = $model->store($request->user_id,$request->product_id);
            return response()->json($items, 201);
        }
    }
}
