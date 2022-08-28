<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function register(Request $request){
    $data = Validator::make($request->all(),[
            'name' => 'required|string|min:3|max:50',
            'email' => 'required|string|email|max:100|unique:users',
            'password' => 'required|string|min:8',
        ]);

        if($data->fails()){
            return response()->json([
                'status'=>'404',
                'message'=>'registation fail',
                'error' => $request->errors(),
            ], 401);
        }
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();
        return response()->json([
            'status' => true,
            'message' => 'User successfully registered',
            'user' => $user,
        ], 201); 
    }
}
