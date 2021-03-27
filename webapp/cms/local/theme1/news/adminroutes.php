<?php
/*
 * get countries data
 */
Route::post('get-news-data','NewsController@getData')->name('get_news_data_from_admin');
/*
 * bulk action
 */
Route::post('do-status-change-for-news/{action}','NewsController@statusChange')->name('news_action_from_admin');

Route::get('rnews',function() {
	return view('news::admin.rnews');
})->name('rnews');

Route::get('update-news-from-resource','NewsController@getNewsFromResource')->name('update_rnews');

Route::post('get-news-from-resource','NewsController@getResourceNewsData')->name('get_rnews_data_from_admin');

Route::post('update-rnews-status/{action}','NewsController@rNewsStatusChange')->name('update_rnews_status');


Route::delete('delete-rnews','NewsController@destroyRnews')->name('delete_rnews');

Route::get('update-news','NewsController@updateNews')->name('update-news');
/*
* resource controller
*/
Route::resource('news','NewsController');
