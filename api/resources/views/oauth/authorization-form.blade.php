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
            Welcome to the OAuth2.0 Server!

            You have been sent here by <strong>{{$client->getName()}} </strong> . <strong>{{$client->getName()}} </strong> would like to access the following data:
            <ul>
            <li>friends</li>
            <li>memories</li>
             </ul>
            It will use this data to:
            <ul>
            <li>integrate with friends</li>
            <li>make your life better</li>
            <li>miscellaneous nefarious purposes</li>
            </ul>
            Click the button below to complete the authorize request and grant an Authorization Code to <strong>{{$client->getName()}} </strong>.


            <h2></h2>
            <form method="post" action="{{route('oauth.authorize.post', $params)}}">
              {{ csrf_field() }}
              <input type="hidden" name="client_id" value="{{$params['client_id']}}">
              <input type="hidden" name="redirect_uri" value="{{$params['redirect_uri']}}">
              <input type="hidden" name="response_type" value="{{$params['response_type']}}">
              <input type="hidden" name="state" value="{{$params['state']}}">
              <input type="hidden" name="scope" value="{{$params['scope']}}">

              <button type="submit" name="approve" value="1">Approve</button>
              <button type="submit" name="deny" value="1">Deny</button>
            </form>




          </div>
        </div>
      </div>

    </div>
  </div>
  </div>
  </div>
@endsection
