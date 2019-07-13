<?php
Route::group(['middleware' => ['auth']], function () {
    Route::get('/', 'DashboardController@index')->name('home');
});
Route::group(['middleware' => ['guest']], function () {
    Route::get('login', 'Auth\LoginController@showLoginForm')->name('google.login');
    Route::get('logout', 'DashboardController@logout')->name('logout');
    Route::get('/auth','Auth\LoginController@initializeLoginWithGoogle')->name('initialize.google.login');
    Route::get('/auth/complete','Auth\LoginController@completeLoginWithGoogle')->name("complete.google.login");
});
Route::post('/comments/data','CommentController@submit_data');