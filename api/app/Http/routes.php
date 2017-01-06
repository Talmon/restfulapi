<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
use App\User;

Route::auth();

Route::get('/home', 'HomeController@index');



Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => ['web']], function (){

    Route::get('developers','OauthController@index');
    Route::get('developers/{id}','OauthController@show');
    Route::get('register/app','OauthController@create');
    Route::post('register/app','OauthController@store');

});

Route::group(['middleware' => ['check-authorization-params','auth','csrf']], function (){
    Route::get('oauth/authorize','OauthController@authorization');
});

Route::get('oauth/access_token','OauthController@getAccessToken');

Route::get('articles','ArticlesController@index');

Route::get('oauth/Lara254/authorizationCode', 'OauthController@auth_code');

$api = app('Dingo\Api\Routing\Router');

$api->version('v1', function ($api) {

    $api->post('authenticate','App\Http\Controllers\Auth\AuthController@authenticate');
    $api->post('auth/login','App\Http\Controllers\Auth\AuthController@authenticate');

});

$api->version('v1',['middleware' => 'api.auth'], function ($api) {
    $api->get('users','App\Http\Controllers\Auth\AuthController@index');
    $api->get('users/{id}','App\Http\Controllers\Auth\AuthController@show');
    $api->get('token','App\Http\Controllers\Auth\AuthController@getToken');
    $api->delete('delete/{id}','App\Http\Controllers\Auth\AuthController@destroy');
    $api->post('oauth/access_token', 'App\Http\Controllers\OauthController@getAccessToken');
    $api->post('oauth/clients', 'App\Http\Controllers\OauthController@store');

    //api routes to access articles
    $api->get('articles','App\Http\Controllers\ArticlesController@index');
    $api->get('articles/{id}','App\Http\Controllers\ArticlesController@show');
    $api->post('articles','App\Http\Controllers\ArticlesController@store');
    $api->post('articles/{id}','App\Http\Controllers\ArticlesController@update');
    $api->delete('articles/{id}','App\Http\Controllers\ArticlesController@destroy');


    $api->group(['middleware' => ['check-authorization-params']], function ($api)  {

        $api->get('oauth/authorize','App\Http\Controllers\OauthController@authorization');

    });

});


Route::post('oauth/authorize', ['as' => 'oauth.authorize.post', 'middleware' => ['csrf', 'check-authorization-params', 'auth'], function() {

    $params = Authorizer::getAuthCodeRequestParams();
    $params['user_id'] = Auth::user()->id;
    $redirectUri = '/';

    // If the user has allowed the client to access its data, redirect back to the client with an auth code.
    if (Request::has('approve')) {
        $redirectUri = Authorizer::issueAuthCode('user', $params['user_id'], $params);
    }

    // If the user has denied the client to access its data, redirect back to the client with an error message.
    if (Request::has('deny')) {
        $redirectUri = Authorizer::authCodeRequestDeniedRedirectUri();
    }

    return Redirect::to($redirectUri);
}]);


Route::group(['middleware' => ['oauth:users']], function (){

    Route::get('protected-resource','OauthController@getResource');

});