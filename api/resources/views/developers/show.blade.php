@extends('developers.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">


                        <h2><a href="http://localhost:8000/register/app">Register Application</a></h2>



                    </div>

                    <div class="panel-body">
                        <h3 class="alert-success">{{ $client->name }}</h3>
                        <li><strong>Client Id:</strong>{{$client->id}}</li>
                        <li><strong>Client Secret:</strong>{{$client->secret}}</li>
                        <li><strong>App Redirect Url:</strong>{{$client->app_redirect_url}}</li>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection
