<?php

namespace App\Http\Controllers\API\User;

use Exception;
use Validator;
use JWTAuthException;
use App\Models\User;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Http\Controllers\API\APIController;

class UserAuthenticationController extends APIController {
    public function __construct() {
        $this->middleware('auth:api', ['except' => ['login', 'registration']]);
    }
    public function login(Request $request){
        $validator = Validator::make($request->all(), [
            'username' => 'required',
            'password' => 'required|string|min:6',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
        if (! $token = JWTAuth::attempt($validator->validated())) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
        $message = 'Login Successfully';
        return $this->createNewToken($token,$message);
    }
    public function registration(Request $request){
        $validator = Validator::make($request->all(), [
            'username' => 'required|min:5|max:100|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
        if($validator->fails()){
            return response()->json($validator->errors(), 400);
        }
        $collection = collect($request->all())->merge(['role_id' => 1]);
        $user       = User::create($collection->all());
        $token      = JWTAuth::fromUser($user);
        $message     = 'Registration Successfully';
        return $this->createNewToken($token,$message);
    }
    protected function createNewToken($token,$message){
        return response()->json([
            'message'      => $message,
            'access_token' => $token,
            'token_type'   => 'bearer',
            'expires_in'   => 60*24*7,
        ]);
    }
}
