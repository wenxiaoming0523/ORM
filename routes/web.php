<?php

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

use Illuminate\Http\Request;

use App\User;

Route::get('/', function () {
    return view('welcome');
});



Route::get('faker', function () {

    User::create([
        'name' =>'cat',
        'email' =>'cat@qq.com',
        'password' => bcrypt('cat123')
    ]);

    User::create([
        'name' =>'dog',
        'email' =>'dog@qq.com',
        'password' => bcrypt('dog123')
    ]);

});





Route::get('test', function (Request $request) {

//    $profile = \App\Profile::find(1);
//
//    $p_name = $profile->user;
//
//    dd($p_name);

     $user = $request->user();

     $user->profile()->firstOrCreate(['uid'=>$user->id],
         ['phone'=>'xxxxxxx']
     );

     dd($user->profile);

    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

