<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class oauth_session extends Model
{
    public function oauth_auth_code(){
        return $this->hasOne('oauth_auth_code');
    }
}
