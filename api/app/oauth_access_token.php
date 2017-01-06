<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class oauth_access_token extends Model
{
    public function oauth_access_token_scope(){
        return $this->hasOne('oauth_access_token_scope');
    }
    public function getIdAttribute($id){
        return $id;
    }
}
