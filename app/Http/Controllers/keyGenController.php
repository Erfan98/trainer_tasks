<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Carbon;

use Illuminate\Http\Request;

class keyGenController extends Controller
{
    function show(){
        return view('key_gen');
    }
    function generate($id,$duration){
        $user = new User();
        $user = $user->findOrFail($id);
        $newDateTime = Carbon::now()->addMonth($duration);
        if($user){
            $license_key = base64_encode(json_encode([$id,$newDateTime]));
            return $license_key;
        }
        else{
            return $user;
        }
    }


    function activateKey($key){
        $decoded_license = json_decode(base64_decode($key));
        $id = $decoded_license[0]??NULL;
        if($id==NULL){
            return response('Invalid License Key',400);
        }

        $expire_date = Carbon::parse($decoded_license[1])->format('d/m/Y');
        $user = new User();
        $user = $user->findOrFail($id);
        if($user){
            $user->license_key = $key;
            $user->exprire_date =$decoded_license[1];
            $user->save();

            return $expire_date;
        }

        return response('Invalid License Key',400);



    }
}
