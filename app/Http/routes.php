<?php

//GENERAL
Route::get('/set-locale', ['as' => 'set-locale', 'uses' => 'LanguangeController@set_locale',]);

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
Route::get('/members/template', ['as' => 'template', 'uses' => 'MemberViewController@template',]);

Route::get('/members/personal-info', ['as' => 'personal-info', 'uses' => 'MemberViewController@personal_info',]);
Route::post('/members/upload-profile-pic', ['as' => 'upload-profile-pic', 'uses' => 'MemberController@upload_profile_pic',]);
Route::post('/members/personal-info', ['as' => 'personal-info', 'uses' => 'MemberController@personal_info',]);



// Users Chat Events
Route::get('/setUserOnline', 'ChatController@setUserOnline');
Route::get('/setUserChatId', 'ChatController@setUserChatId');
Route::get('/getUsersOnline', 'ChatController@getUsersOnline');
Route::get('/removeUsersOffline', 'ChatController@removeUsersOffline');
Route::get('/getUserName', ['as' => 'getUserName', 'uses' => 'ChatController@getUserName']);
Route::post('/postMessageToUser', ['as' => 'postMessageToUser', 'uses' => 'ChatController@postMessageToUser']);
Route::post('/setReadMsgs', 'ChatController@setReadMsgs');
Route::post('/setChatGroup', 'ChatController@setChatGroup');
Route::get('/getUsersInfo', 'ChatController@getUsersInfo');

// Mobile Chat Authentication
Route::get('/storeDeviceID', 'ChatController@storeDeviceID');
Route::get('/members/ui', ['as' => 'frontpage', 'uses' => 'UiController@frontpage']);