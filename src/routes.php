<?php

Route::middleware(['web','api'])->group(function(){

    Route::get('login-facebook/{type}','social\sociallogin\socialapp\FacebookController@login_app')->name('login-facebook');
    Route::get('facebook-login','social\sociallogin\socialapp\FacebookController@social_call')->name('social-login');

    Route::get('login-google/{type}','social\sociallogin\socialapp\GoogleController@login_app')->name('login-google');
    Route::get('google-login','social\sociallogin\socialapp\GoogleController@social_call')->name('social-login');

    Route::get('login-linkedin/{type}','social\sociallogin\socialapp\LinkedInController@login_app')->name('login-linkedin');
    Route::get('linkedin-login','social\sociallogin\socialapp\LinkedInController@social_call')->name('social-login');
});
