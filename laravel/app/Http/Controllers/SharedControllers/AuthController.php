<?php

namespace App\Http\Controllers\SharedControllers;
use App\Http\Requests\SignUpRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use App\User;
use App\Models\User as RUser;



class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('api', ['except' => ['login','signup']]);
    }

    public function login(Request $request)
    {
        $credentials = $request->json()->all();
        if (!$token = auth()->attempt($credentials)) {
            return response()->json(['error' => 'Email or password does not exist'], 401);
        }
        return $this->respondWithToken($token);
    }

    public function register(Request $request)
    {
        $model = new RUser();
        $first_name = $request->first_name;
        $last_name = $request->last_name;
        $email = $request->email;
        $password = $request->password;
        $address = $request->address;
        try{
            $item = $model->register($first_name,$last_name,$email,$password,$address);
            return response()->json($item, 201);
        }
        catch(\Exception $sql){
            Log::critical($sql->getMessage());
            return response(null, 500);
        }

    }


    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth('api')->factory()->getTTL() * 60,
            'user' => auth()->user()->id,
            'role_id' => auth()->user()->role_id
        ]);
    }
}
