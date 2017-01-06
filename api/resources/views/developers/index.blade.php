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
                        @foreach( $clients as $client)
                           <a href="{{  url('developers/'.$client->id) }}"> <h3 class="text-warning">({{ ++$num }}) {{$client->name}}</h3></a>
                        @endforeach
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
