<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        $user = User::where('email', $credentials['email'])->first();
        if ($user && Hash::check($credentials['password'], $user->password)) {
            Auth::login($user);
            session(['name' => $user->name]);
            session(['email' => $user->email]);
            return redirect()->route('home')->with('success', 'Logged In Successfully');
        }
        return redirect()->back()->with('error', 'Invalid Credentials.');
    }
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' =>  'required'
        ]);
        $userData = $request->all();
        $name = isset($userData['name']) ? $userData['name'] : '';
        $user = User::create([
            'name' => $name,
            'email' => $userData['email'],
            'password' => bcrypt($userData['password'])
        ]);
        $user->save();
        return  redirect()->route('login')->with('success','User Created Successfully');
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('login')->with('success','Logged Out Successfully');
    }
}
