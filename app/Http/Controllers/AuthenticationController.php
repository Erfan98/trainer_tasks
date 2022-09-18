<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticationController extends Controller
{
    function store(){
        $request = request();
        /*validity is important in registration
        But as in the instruction pdf there are not mention
        about validating data `i am not validating registraion from here
        instead I am directly storing them in database
        */

        $request->validate([
            'mobile_number' => 'required|unique:users',
            'password' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|unique:users'
        ]);


        $user = new User();
        $user->first_name = request()->first_name;
        $user->last_name = request()->last_name;
        $user->org = request()->org;
        $user->street = request()->street;
        $user->city = request()->city;
        $user->mobile_number = request()->mobile_number;
        $user->email = request()->email;
        $user->password = bcrypt(request()->password);

        if($user->save()){
            return redirect('/login');
        }
        else{
            return view('register');
        }
    }

    function login(){
        if(Auth::attempt(request()->only('mobile_number','password'))){
            return redirect('/');

        }
        else{
            //dd(false);
            return redirect('/login')->withErrors('Invalid Phone Number or Password');
        }
       //dd($u);
    }
}
