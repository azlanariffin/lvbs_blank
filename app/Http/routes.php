<?php

//GENERAL
Route::post('/set-locale', ['as' => 'set-locale', 'uses' => 'LanguangeController@set_locale',]);

//FACEBOOK LOGIN
Route::get('/fblogin', ['as' => 'fblogin', 'uses' => 'UserController@redirectToProvider',]);
Route::get('/getfblogin', ['as' => 'getfblogin', 'uses' => 'UserController@handleProviderCallback',]);

//FRONT
Route::get('/', ['as' => 'login', 'uses' => 'UserViewController@login',]);

Route::get('/login', ['as' => 'login', 'uses' => 'UserViewController@login',]);
Route::post('/login', ['as' => 'login', 'uses' => 'UserController@login',]);

Route::get('/signup', ['as' => 'signup', 'uses' => 'UserViewController@signup',]);
Route::post('/signup', ['as' => 'signup', 'uses' => 'UserController@signup',]);

Route::get('/verify-email', ['as' => 'verify-email', 'uses' => 'UserViewController@verify_email',]);
Route::post('/verify-email', ['as' => 'verify-email', 'uses' => 'UserController@verify_email',]);

Route::get('/logout', ['as' => 'logout', 'uses' => 'UserController@logout',]);

Route::get('/reset-password', ['as' => 'reset-password', 'uses' => 'UserViewController@reset_password',]);

//MEMBER
Route::get('/members/home', ['as' => 'home', 'uses' => 'MemberViewController@home',]);

Route::get('/members/personal-info', ['as' => 'personal-info', 'uses' => 'MemberViewController@personal_info',]);