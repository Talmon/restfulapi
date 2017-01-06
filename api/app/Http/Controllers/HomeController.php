<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\oauth_client_endpoint;
use Illuminate\Http\Request;
use App\oauth_client;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $client = oauth_client::where('user_id',\Auth::user()->id)->first();
        /*DB::table('oauth_client_endpoints')->insert(
            ['client_id' => $client->id, 'redirect_uri' => 'oauth/Lara254/authorizationCode']
        );*/
        $redirect_uri = oauth_client_endpoint::where('client_id',$client->id)->first();
        return view('home',compact('client','redirect_uri'));
    }
}
