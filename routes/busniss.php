<?php


Route::group(['namespace' => 'Busniss'], function() {
    
    Route::get('/', 'HomeController@index')->name('busniss.dashboard');

    // Login
    Route::get(                 'login', 'Auth\LoginController@showLoginForm')->name('busniss.login');
    Route::post(                'login', 'Auth\LoginController@login')->name('busniss.login2');
    Route::post(               'logout', 'Auth\LoginController@logout')->name('busniss.logout');
 
    // Register
    Route::get(              'register', 'Auth\RegisterController@showRegistrationForm')->name('busniss.register');
    Route::post(             'register', 'Auth\RegisterController@register');
    Route::post(   'register/pharmacie', 'Auth\RegisterController@register_pharmacie')->name('busniss.register.pharmacie');
    Route::post(   'register/lab'      , 'Auth\RegisterController@register_lab')->name('busniss.register.lab');

    // Passwords
    Route::post(       'password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('busniss.password.email');
    Route::post(       'password/reset', 'Auth\ResetPasswordController@reset');
    Route::get(        'password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('busniss.password.request');
    Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('busniss.password.reset');

    // Must verify email
    Route::get(          'email/resend','Auth\VerificationController@resend')->name('busniss.verification.resend');
    Route::get(          'email/verify','Auth\VerificationController@show')->name('busniss.verification.notice');
    Route::get(     'email/verify/{id}','Auth\VerificationController@verify')->name('busniss.verification.verify');

});