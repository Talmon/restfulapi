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

                        Resource Request Complete!

                        You have successfully called the APIs with your Access Token. Here are the users:
                        @foreach($users as $user)
                            <li>{{ $user->name }}</li>
                        @endforeach

                    </div>
                </div>
            </div>

        </div>
    </div>
    </div>
    </div>
@endsection

