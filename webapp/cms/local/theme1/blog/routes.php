<?php

Route::group(['prefix' => 'blogs'], function() {
    /**
     * blog list
     */
    Route::get('/', 'BlogController@index');

    /**
     * blog details
     */
    Route::get('/{id}', 'BlogController@show');

});