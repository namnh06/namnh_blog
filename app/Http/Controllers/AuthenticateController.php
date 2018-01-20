<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\JWTAuth;
use App\Models\User;

class AuthenticateController extends Controller
{
    //
    public function authenticate(Request $request){
        $credentials = $request->only('email','password');
        
        try {
            if(!$token = JWTAuth::attempt($credentials)){
                return response_error(
                    [
                        'error'=>'invalid_credentials'
                    ],
                    'invalid email or password or both of them',401
                );
            }
        } catch(JWTException $e){
            return response_error(
                [
                    'error' => 'could_not_create_token'
                ],
                'something went wrong',401
            );
        }
        
        return response_success([
            'token'=>compact('token')
        ],
            'successfully');
    }
    
    public function register(Request $request){
        $name = $request->name;
        $email = $request->email;
        $password = $request->password;
        $status = 1;
        
        $validator = Validator::make($request->all(),[
            'name' => 'required|unique:users',
            'email' => 'required|email|unique:users'
        ]);
        if($validator->fails()){
            return response_error(['error' => $validator->errors()->all()],
                'something went wrong',401);
        }
       
        User::create(['name' => $name, 'email' => $email, 'password' => bcrypt($password), 'status' => $status]);
    
        return response_success([], 'create user = ' . $email . ' successfully');
    }
}
