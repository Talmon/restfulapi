<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class oauth_auth_code extends Model
{
    public function oauth_session(){
        return $this->hasOne('oauth_session');
    }
    public function getIdAttribute($id){
        return $id;
    }
}
