<?php
use Illuminate\Support\Facades\Route;

Route::get('login-facebook/{type}','SocialLogin\socialapp\FacebookController@login_app')->name('login-facebook');
Route::get('facebook-login','SocialLogin\socialapp\FacebookController@socialApp')->name('social-login');

Route::get('login-google/{type}','SocialLogin\socialapp\GoogleController@login_app')->name('login-google');
Route::get('google-login','SocialLogin\socialapp\GoogleController@socialApp')->name('social-login');

Route::get('login-linkedin/{type}','SocialLogin\socialapp\LinkedInController@login_app')->name('login-linkedin');
Route::get('linkedin-login','LinkedInController@socialApp')->name('social-login');
