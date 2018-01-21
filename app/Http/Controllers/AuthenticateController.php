<?php

namespace App\Http\Controllers;

use Namshi\JOSE\JWT;
use Validator;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Exceptions\JWTException;
use App\Models\User;

class AuthenticateController extends Controller
{
    //
    public function login(Request $request){
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
        $user = User::select('id','name','email')->where('email',$request->input
        ('email'))->first();

        $token = JWTAuth::fromUser($user,['user'=>$user]);
        return response_success([
            'token'=>$token
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
    
    public function logout(Request $request){
        $token = $request->bearerToken();
        try {
            JWTAuth::invalidate($token);
            return response_success(['success'=>'log_out_successfully'],'log out successfully');
        } catch (JWTException $exception){
            return response_error(['error'=>'log_out_error'],'something went wrong');
        }
    }
}
