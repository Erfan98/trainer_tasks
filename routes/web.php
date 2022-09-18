<?php

use App\Http\Controllers\AuthenticationController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\keyGenController;
use App\Models\User;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/register', function () {
    return view('register');
})->name('register');

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('logout',function(){
    Auth::logout();
    return redirect('/');
});

Route::get('/getinfo/{id}',function($id){
    $user = new User();
    $user = $user->findOrFail($id);
    return $user;
});
Route::get('/key_gen',[KeyGenController::class,'show']);
Route::get('/generate_key/{id}/{duration}',[KeyGenController::class,'generate']);

Route::get('/activate_key',function(){
    return view('activate_key');
});
Route::get('/active/{key}/',[KeyGenController::class,'activateKey']);


Route::post('/register',[AuthenticationController::class,'store']);
Route::post('/login',[AuthenticationController::class,'login']);
