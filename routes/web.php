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

Auth::routes();

//Route::get('/', 'HomeController@index')->name('home');

Route::get('/', [
    'uses' => 'FontEndController@index',
    'as' => 'home'
]);


Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {

    Route::get('logout', 'Auth\LoginController@logout');
//    Dashboard
    Route::get('/', [
        'uses' => 'DashboardController@index',
        'as' => 'dashboard'
    ]);

//    profile
    Route::get('/profile', [
        'uses' => 'ProfileController@index',
        'as' => 'profile'
    ]);

    Route::post('/profile/update/{id}', [
        'uses' => 'ProfileController@update',
        'as' => 'profile.update'
    ]);

    //    Users

    Route::get('/users', [
        'uses' => 'UsersController@index',
        'as' => 'users'
    ]);

    Route::get('/user/create', [
        'uses' => 'UsersController@create',
        'as' => 'add-user'
    ])->middleware('editor');

    Route::post('/user/store', [
        'uses' => 'UsersController@store',
        'as' => 'user.store'
    ])->middleware('editor');

    Route::get('/user/edit/{id}', [
        'uses' => 'UsersController@edit',
        'as' => 'user.edit'
    ])->middleware('editor');

    Route::post('/user/update/{id}', [
        'uses' => 'UsersController@update',
        'as' => 'user.update'
    ])->middleware('editor');

    Route::get('/user/delete/{id}', [
        'uses' => 'UsersController@destroy',
        'as' => 'user.delete'
    ])->middleware('editor');

    Route::get('/user/trashed', [
        'uses' => 'UsersController@trashed',
        'as' => 'user.trashed'
    ])->middleware('editor');

    Route::get('/users/kill/{id}', [
        'uses' => 'UsersController@kill',
        'as' => 'user.kill'
    ])->middleware('editor');


    Route::get('/users/restore/{id}', [
        'uses' => 'UsersController@restore',
        'as' => 'user.restore'
    ])->middleware('editor');


    Route::get('users/search', [
        'uses' => 'UsersController@search',
        'as' => 'users.search'
    ]);


    Route::post('users/password', [
        'uses' => 'ProfileController@changePassword',
        'as' => 'users.password'
    ]);


//    Category Start

    Route::get('/category', [
        'uses' => 'CategoryController@index',
        'as' => 'category'
    ]);

    Route::get('/category/create', [
        'uses' => 'CategoryController@create',
        'as' => 'category.create'
    ]);

    Route::post('/category/store', [
        'uses' => 'CategoryController@store',
        'as' => 'category.store'
    ]);


    Route::get('/category/edit/{id}', [
        'uses' => 'CategoryController@edit',
        'as' => 'category.edit'
    ]);
    Route::post('/category/update/{id}', [
        'uses' => 'CategoryController@update',
        'as' => 'category.update'
    ]);

    Route::post('/category/show', [
        'uses' => 'CategoryController@show',
        'as' => 'category.show'
    ]);

    Route::get('/category/destroy/{id}', [
        'uses' => 'CategoryController@destroy',
        'as' => 'category.destroy'
    ]);

    Route::get('/category/trashed', [
        'uses' => 'CategoryController@trashed',
        'as' => 'category.trashed'
    ]);

    Route::post('/category/trashed/show', [
        'uses' => 'CategoryController@trashedShow',
        'as' => 'category.trashed.show'
    ]);


    Route::get('/category/restore/{id}', [
        'uses' => 'CategoryController@restore',
        'as' => 'category.restore'
    ]);
    Route::get('/category/kill/{id}', [
        'uses' => 'CategoryController@kill',
        'as' => 'category.kill'
    ]);


    Route::get('/category/active/search', [
        'uses' => 'CategoryController@activeSearch',
        'as' => 'category.active.search'
    ]);

    Route::get('/category/trashed/search', [
        'uses' => 'CategoryController@trashedSearch',
        'as' => 'category.trashed.search'
    ]);


    Route::get('/category/active/action', [
        'uses' => 'CategoryController@activeAction',
        'as' => 'category.active.action'
    ]);

    Route::get('/category/trashed/action', [
        'uses' => 'CategoryController@trashedAction',
        'as' => 'category.trashed.action'
    ]);

//    Category End


//    Blog Start

    Route::get('/blog', [
        'uses' => 'BlogController@index',
        'as' => 'blog'
    ]);

    Route::get('/blog/create', [
        'uses' => 'BlogController@create',
        'as' => 'blog.create'
    ]);

    Route::post('/blog/store', [
        'uses' => 'BlogController@store',
        'as' => 'blog.store'
    ]);


    Route::get('/blog/edit/{id}', [
        'uses' => 'BlogController@edit',
        'as' => 'blog.edit'
    ]);
    Route::post('/blog/update/{id}', [
        'uses' => 'BlogController@update',
        'as' => 'blog.update'
    ]);

    Route::post('/blog/show', [
        'uses' => 'BlogController@show',
        'as' => 'blog.show'
    ]);

    Route::get('/blog/destroy/{id}', [
        'uses' => 'BlogController@destroy',
        'as' => 'blog.destroy'
    ]);

    Route::get('/blog/trashed', [
        'uses' => 'BlogController@trashed',
        'as' => 'blog.trashed'
    ]);

    Route::post('/blog/trashed/show', [
        'uses' => 'BlogController@trashedShow',
        'as' => 'blog.trashed.show'
    ]);


    Route::get('/blog/restore/{id}', [
        'uses' => 'BlogController@restore',
        'as' => 'blog.restore'
    ]);
    Route::get('/blog/kill/{id}', [
        'uses' => 'BlogController@kill',
        'as' => 'blog.kill'
    ]);


    Route::get('/blog/active/search', [
        'uses' => 'BlogController@activeSearch',
        'as' => 'blog.active.search'
    ]);

    Route::get('/blog/trashed/search', [
        'uses' => 'BlogController@trashedSearch',
        'as' => 'blog.trashed.search'
    ]);


    Route::get('/blog/active/action', [
        'uses' => 'BlogController@activeAction',
        'as' => 'blog.active.action'
    ]);

    Route::get('/blog/trashed/action', [
        'uses' => 'BlogController@trashedAction',
        'as' => 'blog.trashed.action'
    ]);

//    Blog End

//    Service-category Start

    Route::get('/service-category', [
        'uses' => 'ServiceCategoryController@index',
        'as' => 'service-category'
    ]);

    Route::get('/service-category/create', [
        'uses' => 'ServiceCategoryController@create',
        'as' => 'service-category.create'
    ]);

    Route::post('/service-category/store', [
        'uses' => 'ServiceCategoryController@store',
        'as' => 'service-category.store'
    ]);


    Route::get('/service-category/edit/{id}', [
        'uses' => 'ServiceCategoryController@edit',
        'as' => 'service-category.edit'
    ]);
    Route::post('/service-category/update/{id}', [
        'uses' => 'ServiceCategoryController@update',
        'as' => 'service-category.update'
    ]);

    Route::post('/service-category/show', [
        'uses' => 'ServiceCategoryController@show',
        'as' => 'service-category.show'
    ]);

    Route::get('/service-category/destroy/{id}', [
        'uses' => 'ServiceCategoryController@destroy',
        'as' => 'service-category.destroy'
    ]);

    Route::get('/service-category/trashed', [
        'uses' => 'ServiceCategoryController@trashed',
        'as' => 'service-category.trashed'
    ]);

    Route::post('/service-category/trashed/show', [
        'uses' => 'ServiceCategoryController@trashedShow',
        'as' => 'service-category.trashed.show'
    ]);


    Route::get('/service-category/restore/{id}', [
        'uses' => 'ServiceCategoryController@restore',
        'as' => 'service-category.restore'
    ]);
    Route::get('/service-category/kill/{id}', [
        'uses' => 'ServiceCategoryController@kill',
        'as' => 'service-category.kill'
    ]);


    Route::get('/service-category/active/search', [
        'uses' => 'ServiceCategoryController@activeSearch',
        'as' => 'service-category.active.search'
    ]);

    Route::get('/service-category/trashed/search', [
        'uses' => 'ServiceCategoryController@trashedSearch',
        'as' => 'service-category.trashed.search'
    ]);


    Route::get('/service-category/active/action', [
        'uses' => 'ServiceCategoryController@activeAction',
        'as' => 'service-category.active.action'
    ]);

    Route::get('/service-category/trashed/action', [
        'uses' => 'ServiceCategoryController@trashedAction',
        'as' => 'service-category.trashed.action'
    ]);

//    Service Category End


//    Service Start
    Route::get('/service', [
        'uses' => 'ServiceController@index',
        'as' => 'service'
    ]);

    Route::get('/service/create', [
        'uses' => 'ServiceController@create',
        'as' => 'service.create'
    ]);

    Route::post('/service/store', [
        'uses' => 'ServiceController@store',
        'as' => 'service.store'
    ]);


    Route::get('/service/edit/{id}', [
        'uses' => 'ServiceController@edit',
        'as' => 'service.edit'
    ]);
    Route::post('/service/update/{id}', [
        'uses' => 'ServiceController@update',
        'as' => 'service.update'
    ]);

    Route::post('/service/show', [
        'uses' => 'ServiceController@show',
        'as' => 'service.show'
    ]);

    Route::get('/service/destroy/{id}', [
        'uses' => 'ServiceController@destroy',
        'as' => 'service.destroy'
    ]);

    Route::get('/service/trashed', [
        'uses' => 'ServiceController@trashed',
        'as' => 'service.trashed'
    ]);

    Route::post('/service/trashed/show', [
        'uses' => 'ServiceController@trashedShow',
        'as' => 'service.trashed.show'
    ]);


    Route::get('/service/restore/{id}', [
        'uses' => 'ServiceController@restore',
        'as' => 'service.restore'
    ]);
    Route::get('/service/kill/{id}', [
        'uses' => 'ServiceController@kill',
        'as' => 'service.kill'
    ]);


    Route::get('/service/active/search', [
        'uses' => 'ServiceController@activeSearch',
        'as' => 'service.active.search'
    ]);

    Route::get('/service/trashed/search', [
        'uses' => 'ServiceController@trashedSearch',
        'as' => 'service.trashed.search'
    ]);


    Route::get('/service/active/action', [
        'uses' => 'ServiceController@activeAction',
        'as' => 'service.active.action'
    ]);

    Route::get('/service/trashed/action', [
        'uses' => 'ServiceController@trashedAction',
        'as' => 'service.trashed.action'
    ]);

//    Service End



//    Team Start

    Route::get('/team', [
        'uses' => 'TeamController@index',
        'as' => 'team'
    ]);

    Route::get('/team/create', [
        'uses' => 'TeamController@create',
        'as' => 'team.create'
    ]);

    Route::post('/team/store', [
        'uses' => 'TeamController@store',
        'as' => 'team.store'
    ]);


    Route::get('/team/edit/{id}', [
        'uses' => 'TeamController@edit',
        'as' => 'team.edit'
    ]);
    Route::post('/team/update/{id}', [
        'uses' => 'TeamController@update',
        'as' => 'team.update'
    ]);

    Route::post('/team/show', [
        'uses' => 'TeamController@show',
        'as' => 'team.show'
    ]);

    Route::get('/team/destroy/{id}', [
        'uses' => 'TeamController@destroy',
        'as' => 'team.destroy'
    ]);

    Route::get('/team/trashed', [
        'uses' => 'TeamController@trashed',
        'as' => 'team.trashed'
    ]);

    Route::post('/team/trashed/show', [
        'uses' => 'TeamController@trashedShow',
        'as' => 'team.trashed.show'
    ]);


    Route::get('/team/restore/{id}', [
        'uses' => 'TeamController@restore',
        'as' => 'team.restore'
    ]);
    Route::get('/team/kill/{id}', [
        'uses' => 'TeamController@kill',
        'as' => 'team.kill'
    ]);


    Route::get('/team/active/search', [
        'uses' => 'TeamController@activeSearch',
        'as' => 'team.active.search'
    ]);

    Route::get('/team/trashed/search', [
        'uses' => 'TeamController@trashedSearch',
        'as' => 'team.trashed.search'
    ]);


    Route::get('/team/active/action', [
        'uses' => 'TeamController@activeAction',
        'as' => 'team.active.action'
    ]);

    Route::get('/team/trashed/action', [
        'uses' => 'TeamController@trashedAction',
        'as' => 'team.trashed.action'
    ]);

//    Team End

//    Gallery Start

    Route::get('/gallery', [
        'uses' => 'GalleryController@index',
        'as' => 'gallery'
    ]);

    Route::get('/gallery/create', [
        'uses' => 'GalleryController@create',
        'as' => 'gallery.create'
    ]);

    Route::post('/gallery/store', [
        'uses' => 'GalleryController@store',
        'as' => 'gallery.store'
    ]);


    Route::get('/gallery/edit/{id}', [
        'uses' => 'GalleryController@edit',
        'as' => 'gallery.edit'
    ]);
    Route::post('/gallery/update/{id}', [
        'uses' => 'GalleryController@update',
        'as' => 'gallery.update'
    ]);

    Route::post('/gallery/show', [
        'uses' => 'GalleryController@show',
        'as' => 'gallery.show'
    ]);

    Route::get('/gallery/destroy/{id}', [
        'uses' => 'GalleryController@destroy',
        'as' => 'gallery.destroy'
    ]);

    Route::get('/gallery/trashed', [
        'uses' => 'GalleryController@trashed',
        'as' => 'gallery.trashed'
    ]);

    Route::post('/gallery/trashed/show', [
        'uses' => 'GalleryController@trashedShow',
        'as' => 'gallery.trashed.show'
    ]);


    Route::get('/gallery/restore/{id}', [
        'uses' => 'TeamController@restore',
        'as' => 'gallery.restore'
    ]);
    Route::get('/gallery/kill/{id}', [
        'uses' => 'GalleryController@kill',
        'as' => 'gallery.kill'
    ]);


    Route::get('/gallery/active/search', [
        'uses' => 'GalleryController@activeSearch',
        'as' => 'gallery.active.search'
    ]);

    Route::get('/gallery/trashed/search', [
        'uses' => 'GalleryController@trashedSearch',
        'as' => 'gallery.trashed.search'
    ]);


    Route::get('/gallery/active/action', [
        'uses' => 'GalleryController@activeAction',
        'as' => 'gallery.active.action'
    ]);

    Route::get('/gallery/trashed/action', [
        'uses' => 'GalleryController@trashedAction',
        'as' => 'gallery.trashed.action'
    ]);

//    Gallery End









//    Slider Start

    Route::get('/slider', [
        'uses' => 'SliderController@index',
        'as' => 'slider'
    ]);

    Route::get('/slider/create', [
        'uses' => 'SliderController@create',
        'as' => 'slider.create'
    ]);

    Route::post('/slider/store', [
        'uses' => 'SliderController@store',
        'as' => 'slider.store'
    ]);


    Route::get('/slider/edit/{id}', [
        'uses' => 'SliderController@edit',
        'as' => 'slider.edit'
    ]);
    Route::post('/slider/update/{id}', [
        'uses' => 'SliderController@update',
        'as' => 'slider.update'
    ]);

    Route::post('/slider/show', [
        'uses' => 'SliderController@show',
        'as' => 'slider.show'
    ]);

    Route::get('/slider/destroy/{id}', [
        'uses' => 'SliderController@destroy',
        'as' => 'slider.destroy'
    ]);

    Route::get('/slider/trashed', [
        'uses' => 'SliderController@trashed',
        'as' => 'slider.trashed'
    ]);

    Route::post('/slider/trashed/show', [
        'uses' => 'SliderController@trashedShow',
        'as' => 'slider.trashed.show'
    ]);


    Route::get('/slider/restore/{id}', [
        'uses' => 'SliderController@restore',
        'as' => 'slider.restore'
    ]);
    Route::get('/slider/kill/{id}', [
        'uses' => 'SliderController@kill',
        'as' => 'slider.kill'
    ]);


    Route::get('/slider/active/search', [
        'uses' => 'SliderController@activeSearch',
        'as' => 'slider.active.search'
    ]);

    Route::get('/slider/trashed/search', [
        'uses' => 'SliderController@trashedSearch',
        'as' => 'slider.trashed.search'
    ]);


    Route::get('/slider/active/action', [
        'uses' => 'SliderController@activeAction',
        'as' => 'slider.active.action'
    ]);

    Route::get('/slider/trashed/action', [
        'uses' => 'SliderController@trashedAction',
        'as' => 'slider.trashed.action'
    ]);

//    Slider End



//    Settings

    Route::get('/settings', [
        'uses' => 'SettingsController@index',
        'as' => 'settings'
    ]);
    Route::post('/setting/update', [
        'uses' => 'SettingsController@update',
        'as' => 'setting.update'
    ]);


});



