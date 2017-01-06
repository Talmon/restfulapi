<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class oauth_access_token_scope extends Model
{
    public function oauth_access_token(){
        return $this->hasOne('oauth_access_token');
    }
}
