<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Models\Role;
Use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegistrationController extends Controller
{
protected function create (array $data)
    {
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
        
        $user->roles()->attach(Role::where('name', 'user')->first());
        return $user;

    }

}

