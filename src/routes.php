<?php
use Illuminate\Support\Facades\Route;

Route::get('login-facebook/{type}','Social\SocialLogin\socialapp\FacebookController@login_app')->name('login-facebook');
Route::get('facebook-login','Social\SocialLogin\socialapp\FacebookController@socialApp')->name('social-login');

Route::get('login-google/{type}','Social\SocialLogin\socialapp\GoogleController@login_app')->name('login-google');
Route::get('google-login','Social\SocialLogin\socialapp\GoogleController@socialApp')->name('social-login');

Route::get('login-linkedin/{type}','Social\SocialLogin\socialapp\LinkedInController@login_app')->name('login-linkedin');
Route::get('linkedin-login','Social\LinkedInController@socialApp')->name('social-login');
