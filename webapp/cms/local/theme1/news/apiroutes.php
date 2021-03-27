<?php
/*
 * news group
 */
Route::group(['prefix' => 'news'], function() {
	/*
	 * flash api
	 */
	Route::get('get-initial-info','NewsApiController@flashApi');
	
	Route::group(['middleware' => 'UserAuthForApi'], function() {
	    
	    /*
	     * get all
	     */
	    Route::get('get-all','NewsApiController@getNews');
	    /*
	     * like action
	     */
	    Route::post('like-action','NewsApiController@likeAction');
	    /*
	     * view action
	     */
	    Route::post('view-action','NewsApiController@viewsAction');
	    /*
	     * share action
	     */
    	Route::post('share-action','NewsApiController@shareAction');
    	/*
    	 * fav action
    	 */
    	Route::post('fav-action','NewsApiController@favAction');
    	/*
    	 * add comment
    	 */
    	Route::post('add-comment','NewsApiController@addComment');
    	/*
    	 * remove comment
    	 */
    	Route::post('remove-comment','NewsApiController@removeComment');
    	/*
    	 * add reply comment
    	 */
    	Route::post('add-reply','NewsApiController@addReply');
    	/*
    	 * remove reply comment
    	 */
    	Route::post('remove-reply','NewsApiController@removeReply');
    	/*
    	 * get comments
    	 */
    	Route::get('get-comments','NewsApiController@getComments');
    	/*
    	 * get replys
    	 */
    	Route::get('get-replys','NewsApiController@getReplys');
    	/*
    	 * get fav
    	 */
    	Route::get('get-fav','NewsApiController@getFavs');

	});
});