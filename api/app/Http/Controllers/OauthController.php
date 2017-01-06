<?php

namespace App\Http\Controllers;

use App\oauth_access_token;
use Illuminate\Http\Request;
use Response;
use Authorizer;
use App\oauth_client;
use App\oauth_auth_code;
use App\User;
use Illuminate\Support\Facades\DB;

use App\Http\Requests;

class OauthController extends Controller
{
    
    
    public function authorization(){

        $authParams = Authorizer::getAuthCodeRequestParams();

        $formParams = array_except($authParams,'client');

        $formParams['client_id'] = $authParams['client']->getId();

        $formParams['scope'] = implode(config('oauth2.scope_delimiter'), array_map(function ($scope) {
            return $scope->getId();
        }, $authParams['scopes']));
        $params = $formParams;
        $client = $authParams['client'];

        return view('oauth.authorization-form', compact('params','client'));
    }
    
    
    


    public function getAuthCode(){
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
    }
    public function auth_code(){
        $auth_code = oauth_auth_code::latest('created_at')->first();
        $client = oauth_client::where('user_id',\Auth::user()->id)->first();
        return view('oauth.authorization-code',compact('auth_code','client'));
    }


    public function getAccessToken(){
        $token = Response::json(Authorizer::issueAccessToken());
        $code = oauth_access_token::latest('created_at')->first();
        DB::table('oauth_access_token_scopes')->insert(
            ['access_token_id' => $code->id, 'scope_id' => 'articles']
        );
        return view('oauth.access-token',compact('code','token'));
    }

    public function getResource(){
        $users = User::all();
        return view('oauth.users',compact('users'));
    }

    //show all clients
    public function index(){
        if(\Auth::check()){
            $num = 0;
            $clients = oauth_client::where('user_id',\Auth::user()->id)->get();
            //dd($clients);
            return view('developers.index',compact('clients','num'));
        }
        else{
            return redirect('login');
        }


    }
    public function create(){
        return view('developers.register');
    }
    //create a new client
    public function store(Request $request){
        \Auth::user()->oauth_clients()->create($request->all());
        return redirect('api/developers');
    }
    //show a specific client
    public function show($id){
        $client = oauth_client::findorFail($id);
        return view('developers.show',compact('client'));
    }
    //update a client
    public function update(Request $request,$id){
        $client = oauth_client::findorFail($id);
        $client->update($request->all());
        return Response::json('client updated successfully');
    }
    //delete a client
    public function delete($id){
        $client = oauth_client::findorFail($id);
        $client->delete();
        return Response::json('client deleted successfully');
    }

    
}
