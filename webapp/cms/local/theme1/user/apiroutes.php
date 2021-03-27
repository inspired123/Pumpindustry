<?php
/*
 * user group
 */
Route::group(['prefix' => 'user'], function() {
    /*
     * login
     */
    Route::post('login', 'UserController@login');

    /*
     * update profile
     */
    Route::post('update-profile','UserController@updateProfile')->middleware('UserAuthForApi');
});