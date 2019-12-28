<?php

namespace App\Http\Controllers\SharedControllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use function PHPSTORM_META\elementType;

class UsersController extends Controller
{

    //profile methods
    public function getUser($id)
    {
        $model = new User();
        $items = $model->getUser($id);
        if (!empty($items)) {
            return response()->json($items, 200);
        }
        return response(null,500);

    }

    public function getUserCheckout($id)
    {
        $model = new User();
        $items = $model->getUserCheckouts($id);
        if (!empty($items)) {
            return response()->json($items, 200);
        }
        return response(null,500);
    }
}
