<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'EventsController@displayWelcome'
);

Route::get('/events/create', 'EventsController@createEvent');
Route::post('/events/create', 'EventsController@saveEvent');

Route::get('/events/{id}/delete','EventsController@deleteEvent');

Route::post('/events/{id}/edit','EventsController@editEvent');

Route::get('/events/{id}/join','EventsController@joinEvent');

Route::get('/events/leave/{id}','EventsController@leaveEvent');

Route::get('/events/{id}/discussion','EventsController@eventDiscussion');

Route::post('/events/discussion/comment/{id}','EventsController@addComment');

Route::post('/events/{id}/discussion/editComment','EventsController@editComment');

Route::get('/events/{id}/discussion/deleteComment','EventsController@deleteComment');

Route::get('/home', 'EventsController@userEvents');

Auth::routes();

Route::get('/register', 'Auth\RegisterController@displayForm');

Route::post('/register', 'Auth\RegisterController@register')->name('register');;

Route::get('/home/allEvents','EventsController@displayAllEvents');

Route::get('/home/myEvents','EventsController@displayMyEvents');

Route::get('/home/manageEvents','EventsController@displayManageEvents');

Route::get('/event/displayEvent/{id}','EventsController@displayEvent');

Route::get('/hello', function () {
    return 'hello';
});

Route::get('/articles','ArticlesController@showArticles');

Route::get('/articles/create','ArticlesController@createArticle');

Route::get('/articles/{id}','ArticlesController@showArticle');

Route::post('/articles/create','ArticlesController@saveArticle');

Route::get('/articles/{id}/delete','ArticlesController@deleteArticle');

Route::get('/articles/{id}/edit','ArticlesController@showEditArticle');

Route::post('/articles/{id}/edit','ArticlesController@editArticle');

Route::post('/articles/{id}','ArticlesController@saveComment');
