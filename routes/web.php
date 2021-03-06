<?php
// Authenticated Routes
Route::group(['middleware' => ['auth']], function () {
    Route::get('logout', 'Auth\LoginController@logout')->name('logout');
    Route::get('/', 'DashboardController@index')->name('home');
    Route::group(['prefix' => 'post'], function () {
        Route::get('/create', 'Blog\MainController@showAddNewBlogPostPage')->name('post.create.form');
        Route::post('/create', 'Blog\MainController@addNewBlogPost')->name('post.create.complete');
    });

    // POSTS Prefix
    Route::group(['prefix' => 'posts'], function () {
        Route::get('/','DashboardController@viewPosts');
        Route::group(['middleware' => ['admin']], function () {
            Route::get('/draft','DashboardController@allDrafts');
            Route::get('/schedule','DashboardController@scheduledPost');
        });
        // Approval Routes
        Route::group(['prefix' => 'approval', 'middleware' => ['admin']], function () {
            Route::get('/pending','DashboardController@approvalPending');
            Route::post('/pending','DashboardController@approvalPending');
            Route::get('/published','DashboardController@publishedApproval');
        });
    });

    // POST Prefix
    Route::group(['prefix' => 'post', 'middleware' => ['checkPostOwner']], function () {
        Route::get('/edit/{id}','Blog\MainController@editPostShow');
        Route::post('/edit/','Blog\MainController@completeEditPost');
        Route::get('/delete/{id}','Blog\MainController@deleteAPost');
        Route::get('/update/{id}','Blog\NotificationController@sendUsersBlogUpdate');
    });

    // CATEGORIES Prefix
    Route::group(['prefix' => 'categories'], function () {
        Route::get('/','Blog\CategoriesController@getAllCategories');
        Route::get('/{id}','Blog\CategoriesController@viewCategory');
        Route::post('/','Blog\CategoriesController@addCategory');
        Route::post('/edit/{id}','Blog\CategoriesController@updateCategory');
        Route::group(['middleware' => ['admin']], function () {
            Route::get('/delete/{id}','Blog\CategoriesController@removeCategory');
        });
    });

    Route::group(['prefix' => 'file'], function () {
        Route::post('/upload', 'Blog\ImageController@uploadFile');
    });

    Route::group(['prefix' => 'search'], function () {
        Route::group(['prefix' => 'posts'], function () {
            Route::get('', 'Blog\SearchController@index')->name('search.posts');
        });
    });

    Route::group(['prefix' => 'adverts', 'middleware' => ['admin']], function () {
        Route::get('/','Advert\MainController@index');
        Route::get('/new','Advert\MainController@addAdvert');
        Route::post('/new','Advert\MainController@addAdvertComplete');
        Route::get('/edit/{id}','Advert\MainController@editAdvert');
        Route::post('/edit','Advert\MainController@editAdvertComplete');
        Route::get('/delete/{id}','Advert\MainController@deleteAdvert');
    });

    Route::group(['prefix' => 'comments'], function () {
        Route::get('/published','Comment\MainController@publishedComments');
        Route::get('/published','Comment\MainController@publishedComments');
        Route::get('/moderation','Comment\MainController@moderatedComments');
        Route::post('/data','Comment\MainController@modifyComments');
    });

    Route::group(['prefix' => 'comment'], function () {
        Route::get('/remove/{id}','Comment\MainController@removeComment');
        Route::get('/approve/{id}','Comment\MainController@approveComment');
        Route::get('/decline/{id}','Comment\MainController@declineComment');
    });

    Route::group(['prefix' => 'staffs', 'middleware' => ['admin']], function () {
        Route::get('/','Staff\MainController@staffs');
        Route::get('/add','Staff\MainController@addStaff');
        Route::post('/add','Staff\MainController@addStaffComplete');
        Route::get('/remove/{id}','Staff\MainController@removeStaff');
        Route::get('/role/{id}/{role}','Staff\MainController@staffRoleAssign');
    });

    Route::group(['prefix' => 'profile'], function () {
        Route::get('/view/{id}','Profile\MainController@viewProfile');
    });

    Route::group(['prefix' => 'reports'], function () {
        Route::get('/{type}','Report\MainController@reports');
    });

    Route::group(['prefix' => 'settings', 'middleware' => ['admin']], function () {
        Route::get('/','Setting\MainController@index');
        Route::post('/update','Setting\MainController@updateSettings');
    });

    Route::group(['prefix' => 'cache', 'middleware' => ['admin']], function () {
        Route::get('/clear','Setting\MainController@clear');
        Route::group(['prefix' => 'content'], function () {
            Route::get('/pull','Setting\MainController@pullData');
        });
    });
});
// Authenticated Routes End

// Unauthenticated Routes
Route::group(['middleware' => ['guest']], function () {
    Route::get('login', 'Auth\LoginController@showLoginForm')->name('google.login');
    Route::get('/auth','Auth\LoginController@initializeLoginWithGoogle')->name('initialize.google.login');
    Route::get('/auth/complete','Auth\LoginController@completeLoginWithGoogle')->name("complete.google.login");
});
// Unauthenticated Routes End
