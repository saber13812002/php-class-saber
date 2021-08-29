<?php

use App\Models\Player;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/players', function () {
    return controller1();
});

function controller1()
{
    // $response = array(array("id"=>"1"));
    $response = Player::where("active", 1)->get();
    return response($response);
}


// J3 S2
Route::get('/countries', 'App\Http\Controllers\CountryController@index');
// J4 S2
Route::post('/countries', 'App\Http\Controllers\CountryController@store');
Route::delete('/countries/{id}', 'App\Http\Controllers\CountryController@destroy');
Route::get('/countries/{id}', 'App\Http\Controllers\CountryController@show');
Route::put('/countries/{id}', 'App\Http\Controllers\CountryController@update');

Route::group(['prefix' => 'user'], function () {
    Route::post('/register', 'App\Http\Controllers\AccountController@register');
    Route::post('/login', 'App\Http\Controllers\AccountController@login');
});

// user
Route::middleware('checkToken')->group(function () {

    Route::group(['prefix' => 'user'], function () {
        Route::post('/logout', 'App\Http\Controllers\AccountController@logout');
    });

//    Route::group(['prefix' => 'admin'], function () {
//        Route::post('/register', 'App\Http\Controllers\AccountController@register');
//        Route::post('/login', 'App\Http\Controllers\AccountController@login');
//        Route::post('/logout', 'App\Http\Controllers\AccountController@logout');
//    });

});
