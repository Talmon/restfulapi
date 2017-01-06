<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        <li><a href="{{ url('/home') }}">Authorization Code</a></li>
                        <li><a href="{{ url('/home') }}">Password</a></li>
                        <li><a href="{{ url('/home') }}">Client Credentials</a></li>
                    </ul>
                </div>
                <div class="panel-body">
                    The Authorization Code grant type is the most common workflow for OAuth2.0.
                    Clicking the "Authorize" link below will send you to an OAuth2.0 Server to authorize:
                    <div>
                        <a href="{{ url('oauth/authorize?response_type=code&
  client_id='.$client->id.'&redirect_uri='.$redirect_uri->redirect_uri) }}">Authorize</a>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
</div>
</div>