<?php
/*
 * get countries data
 */
Route::post('get-events-data','EventsController@getData')->name('get_events_data_from_admin');
/*
 * bulk action
 */
Route::post('do-status-change-for-events/{action}','EventsController@statusChange')->name('events_action_from_admin');
/*
* resource controller
*/
Route::resource('events','EventsController');
