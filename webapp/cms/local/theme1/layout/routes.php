<?php

Route::get('/', 'LayoutController@homePage');
/**
 * contact page
 */
Route::get('/contact', 'LayoutController@contactPage');
/**
 * blog details
 */
Route::get('/blog/{id}','LayoutController@blogsPage');

Route::post('/contact-action', 'LayoutController@contactPageAction');