@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Sample App Using Oauth 2</h2>
        <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#home">Authorization Code</a></li>
            <li><a data-toggle="tab" href="#menu1">Client Credentials</a></li>
            <li><a data-toggle="tab" href="#menu2">Password</a></li>
            <li><a data-toggle="tab" href="#menu3">Refresh Token</a></li>
        </ul>

        <div class="tab-content">
            <div id="home" class="tab-pane fade in active">
                <h3>Using Authorization Code</h3>
                The Authorization Code grant type is the most common workflow for OAuth2.0.
                Clicking the "Authorize" link below will send you to an OAuth2.0 Server to authorize:
                <div>
                    <a href="{{ url('oauth/authorize?response_type=code&scope=articles&client_id='.$client->id.'&redirect_uri='.$redirect_uri->redirect_uri) }}">Authorize</a>
                </div>
            </div>
            <div id="menu1" class="tab-pane fade">
                <h3>Using Client Credentials</h3>
                The Authorization Code grant type is the most common workflow for OAuth2.0.
                Clicking the "Authorize" link below will send you to an OAuth2.0 Server to authorize:
                <div>
                    <a href="{{ url('oauth/access_token?grant_type=client_credentials&scope=users&client_id='.$client->id.'&client_secret='.$client->secret.'&redirect_uri='.$redirect_uri->redirect_uri) }}">Authorize</a>
                </div>
                </div>
            <div id="menu2" class="tab-pane fade">
                <h3>Using Password</h3>
                The Authorization Code grant type is the most common workflow for OAuth2.0.
                Clicking the "Authorize" link below will send you to an OAuth2.0 Server to authorize:
                <div>
                    <a href="{{ url('oauth/access_token?grant_type=password&scope=users&client_id='.$client->id.'&client_secret='.$client->secret.'&username='.Auth::user()->email.'&password='.Auth::user()->password) }}">Authorize</a>
                </div>
            </div>
            <div id="menu3" class="tab-pane fade">
                <h3>Using Authorization Code</h3>
                The Authorization Code grant type is the most common workflow for OAuth2.0.
                Clicking the "Authorize" link below will send you to an OAuth2.0 Server to authorize:
                <div>
                    <a href="{{ url('oauth/access_token?refresh_token=8mN24d7sjt6rvTBmEvVvzu4zA2VxRxXHaCmCpPDM&grant_type=refresh_token&scope=users&client_id='.$client->id.'&client_secret='.$client->secret.'&redirect_uri') }}">Authorize</a>
                </div>
        </div>
    </div>
  </div>
@endsection
