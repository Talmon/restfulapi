@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="collapse navbar-collapse" id="app-navbar-collapse">
                        <!-- Left Side Of Navbar -->
                        <ul class="nav navbar-nav">
                            <li><a href="{{ url('/home') }}">Authorization Code</a></li>
                            {{--<li><a href="{{ url('/home') }}">Password</a></li>--}}
                            {{--<li><a href="{{ url('/home') }}">Client Credentials</a></li>--}}
                        </ul>
                    </div>
                    <div class="panel-body">
                        Authorization Code Retrieved!

                        We have been given an Authorization Code assigned to code from the OAuth2.0 Server as seen above in the url:

                        Now exchange the Authorization Code for an Access Token:

                        Now make a token request
                        <h2> </h2>
                        <div>
                        <a href="{{ url('oauth/access_token?code='.$auth_code->id.'&grant_type=authorization_code&client_id='.$client->id.'&client_secret='.$client->secret.'&redirect_uri=oauth/Lara254/authorizationCode&scope=users')  }}">get access token</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    </div>
    </div>
@endsection

