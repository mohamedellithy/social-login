<?php

namespace SocialLogin\socialapp;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\Controller;
use App\User;
use Auth;
use Session;
class GoogleController extends SocialController
{
    # here set name of driver of App
    protected $driver     = 'google';

    # here set attribute in DB to store app_ID
    protected $attribute  = 'google_id';

}
