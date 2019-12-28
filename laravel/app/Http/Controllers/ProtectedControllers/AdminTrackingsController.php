<?php

namespace App\Http\Controllers\ProtectedControllers;

use App\Models\AdminModels\AdminTracking;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminTrackingsController extends Controller
{
    public function getAllCheckouts()
    {
        $model = new AdminTracking();
        $items = $model->getAllTrackings();
        if (!empty($items)) {
            return response()->json($items, 200);
        }
        return response()->json(null, 500);
    }

    public function deleteOne(Request $request)
    {
        $model = new AdminTracking();
        $id = $request->getContent();
        try {
            $item = $model->deleteTracking($id);
            return response()->json($item, 204);

        } catch (Exception $e) {
            return response()->json($item, $e->getMessage());
        }
    }

    public function deleteAll()
    {
        $model = new AdminTracking();
        $model->deleteAllTrackings();
        return response()->json(null, 204);
    }

    public function getDelivered()
    {
        $model = new AdminTracking();
        $items = $model->getDelivered();
        if (!empty($items)) {
            return response()->json($items, 200);
        }
        return response()->json(null, 500);
    }

    public function makeDeliver(Request $request)
    {
        $id = $request->getContent();
        $model = new AdminTracking();
        if (!empty($id)) {
            $items = $model->deliver($id);
            if ($items) {
                return response()->json($items, 201);
            } else {
                return response()->json(null, 404);
            }
        }
        return response()->json(null, 500);
    }
}
