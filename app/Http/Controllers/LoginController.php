<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Tymon\JWTAuth\Facades\JWTAuth;

use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function login(Request $request)
    {

        $rules = array(
            'email'  => 'required',
            'password'  => 'required',
        );

        $validator = Validator::make($request->all() , $rules);
        
        if ($validator->fails()) 
        {
            $result = array(
                'errorcode' => '1',
                'message' => $validator->messages()
            );
        }
        else
        {

            $credentials = request(['email', 'password']);

            if (! $token =  JWTAuth::attempt($credentials)) {

                $result = array(
                    'errorcode' => '2',
                    'message' => 'Invalid User'
                );

            }else{

                
                $result = $this->respondWithToken($token);

                $result = array(
                    'errorcode' => '0',
                    'data' => $result
                );
            }
        }

        return response()->json($result);
    }

    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
        ]);
    }

    
}
