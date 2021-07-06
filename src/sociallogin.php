<?php

namespace Social\SocialLogin;

use Illuminate\Database\Eloquent\Model;

class sociallogin extends Model
{

    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = [
        'user_id','facebook_id','google_id','linkedin_id'
    ];

    function user(){
       $this->belongsTo('App\User','user_id','id');
    }
}
