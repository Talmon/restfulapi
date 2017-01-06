<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class oauth_client_endpoint extends Model
{
    protected $fillable = ['redirect_uri'];
}
