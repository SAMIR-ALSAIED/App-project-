<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

use ApiResponse;

public function  register(RegisterRequest $request){

        $data=$request->validated();

        $user=User::create([

        'name'=>$data['name'],
        'email'=>$data['email'],
        'password'=>Hash::make($data['password'])

        ]);

        return $this->SendResponse(201,'User Created Successfuly',['user'=>$user]);


}


public function login(LoginRequest $request){

    // $data=$request->validated();
    $credentials = $request->only('email', 'password');
    if(!Auth::attempt($credentials)){

      return $this->SendResponse(401,'invalid email or password');

    }

    $user=User::where('email',$request->email)->FirstOrFail();

    $token=$user->createToken('Api_Token')->plainTextToken;

        return $this->SendResponse(200,'Logged in successfully',

        [
            'User'=>$user,
            'Token'=>$token
        ]

        );



}


public function logout(Request $request){


     $request->user()->currentAccessToken()->delete();


      return $this->SendResponse(200,'Logged out successfully');

}






}
