<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class article extends Model
{
    protected $fillable = ['name','user_id','content'];
    
    public function users(){
        $this->belongsTo('App\User');
    }
}
