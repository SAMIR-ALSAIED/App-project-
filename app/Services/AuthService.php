<!-- <?php

namespace App\Services;

use App\Models\User;

class AuthService
{


public function register($data)
{
    $user=  User::create([

        'name'=>$data['name'],
        'email'=>$data['email'],
        'password'=>$data['password']

        ]);

        return $user;

}











}
