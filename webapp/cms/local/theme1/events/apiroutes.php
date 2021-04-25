<?php
Route::group(['prefix' => 'events'], function() {
    Route::get('get-all','EventsApiController@getEvents');
});