@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="collapse navbar-collapse" id="app-navbar-collapse">
                        <!-- Left Side Of Navbar -->
                        <ul class="nav navbar-nav">
                            <li><a href="{{ url('/home') }}">Articles</a></li>
                        </ul>
                    </div>
                    <div class="panel-body">

                        @foreach($articles as $article)
                            <li>{{ $article->name }}</li>
                        @endforeach

                    </div>
                </div>
            </div>

        </div>
    </div>
    </div>
    </div>
@endsection

