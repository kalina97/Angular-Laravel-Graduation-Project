<?php

namespace App\Http\Controllers\ProtectedControllers;

use App\Models\AdminModels\AdminUser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminUsersController extends Controller
{
    public function usersIndex()
    {
        $model = new AdminUser();
        $items = $model->getAllUsers();
        if (!empty($items)) {
            return response()->json($items, 200);
        }
        return response()->json(null, 500);

    }

    public function userStore(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:2|max:20',
            'address' => 'required',

        ]);

        $model = new AdminUser();
        $first_name = $request->first_name;
        $last_name = $request->last_name;
        $email = $request->email;
        $password = $request->password;
        $address = $request->address;
        $role_id = $request->role_id;
        try {
            $items = $model->insertUser($first_name,$last_name,$email,$password,$address,$role_id);
            return response()->json($items, 201);
        } catch (\Exception $e) {
            \Log::error('message' . $e->getMessage());
            return response()->json(null, 500);
        }
    }

    public function delete(Request $request)
    {
        $id = $request->getContent();
        $model = new AdminUser();
        try {
            $items = $model->deleteUser($id);
            return response()->json($items, 204);
        } catch (Exception $e) {
            \Log::error('message' . $e->getMessage());
            return response()->json(null, 500);
        }
    }

    public function getOneUser($id)
    {
        $model = new AdminUser();
        $items = $model->getOneUser($id);
        if (!empty($items)) {
            return response()->json($items, 200);
        }
        return response()->json(null, 500);
    }

    public function userUpdate(Request $request, $id)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:2|max:20',
            'address' => 'required',

        ]);

        $model = new AdminUser();
        $first_name = $request->first_name;
        $last_name = $request->last_name;
        $email = $request->email;
        $password = $request->password;
        $address = $request->address;
        $role_id = $request->role_id;

        try {
            $items = $model->updateUser($id,$first_name,$last_name,$email,$password,$address,$role_id);
            return response()->json($items, 204);
        } catch (Expectation $e) {
            \Log::error("message" . $e->getMessage());
            return response()->json(null, 500);
        }
    }

}
