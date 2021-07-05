<?php

namespace Social\SocialLogin\socialapp;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\Controller;
use App\User;
use Auth;
use Session;
class LinkedInController extends SocialController
{
    # here set name of driver of App
    protected $driver     = 'linkedin';

    # here set attribute in DB to store app_ID
    protected $attribute  = 'linkedin_id';

}
