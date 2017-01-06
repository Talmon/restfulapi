<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class oauth_client extends Model
{
    protected $fillable = ['name','app_url','app_redirect_url'];
    
    public function getIdAttribute($id){
        return $id;
    }
    public static function boot(){
        static::creating(function($model){
            $model->id = str_random(20);
            $model->secret = str_random(20);
        });
    }
    public function oauth_clients(){
        return $this->belongsTo('App\User');
    }
}
