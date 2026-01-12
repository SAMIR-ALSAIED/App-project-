<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Http\Traits\ApiResponse;
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

        return $this->success('User Created Successfuly',['user'=>$user] ,201);


}


public function login(LoginRequest $request){


    $credentials = $request->only('email', 'password');
    if(!Auth::attempt($credentials)){

      return $this->error('invalid email or password',[], 400);

    }

    $user=Auth::user();

    $token=$user->createToken('Api_Token')->plainTextToken;

        return $this->success('Logged in successfully',

        [
            'user'=>$user,
            'token'=>$token


          ],200);



}


public function logout(Request $request){


     $request->user()->currentAccessToken()->delete();


      return $this->success('Logged out successfully',[],200);

}






}
