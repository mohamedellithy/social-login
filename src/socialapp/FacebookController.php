<?php

namespace Social\SocialLogin\socialapp;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\Controller;
use App\User;
use App\Auth;
use App\Session;
class FacebookController extends SocialController
{
    # here set name of driver of App
    protected $driver     = 'facebook';

    # here set attribute in DB to store app_ID
    protected $attribute  = 'facebook_id';

}
