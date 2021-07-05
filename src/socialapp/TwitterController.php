<?php

namespace SocialLogin\socialapp;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\Controller;
use App\User;
use Auth;
use Session;
class TwitterController extends SocialController
{
    # here set name of driver of App
    protected $driver     = 'twitter';

    # here set attribute in DB to store app_ID
    protected $attribute  = 'twitter_id';

}
