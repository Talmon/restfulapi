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
                        Token Retrieved!


                       <p> {{ $token }}</p>
                       <br>
                        Now use this token to make a request to the OAuth2.0 Server's APIs:
                        <a href="{{ url('protected-resource?access token='.$code->id)  }}">get protected resource</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
    </div>
    </div>
@endsection

