<?php

Route::group(['as'=>'admin.','prefix'=>'admin'],function (){

    Route::get('home', 'AdminController@index')->name('home');
    Route::get('login', 'LoginController@showLoginForm')->name('login');
    Route::post('login', 'LoginController@login');
    Route::get('logout', 'AdminController@logout')->name('logout');

// Password Reset Routes...
    Route::get('/password/reset', 'ForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::post('/password/email', 'ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::get('/reset/password/{token}', 'ResetPasswordController@showResetForm')->name('password.reset');
    Route::post('/update/reset', 'ResetPasswordController@reset')->name('reset.update');
    Route::get('/Change/Password','AdminController@ChangePassword')->name('password.change');
    Route::post('/password/update','AdminController@Update_pass')->name('password.update');


    /////////////////////////////////////
    /// Category

    Route::group(['as'=>'category.','prefix'=>'category','namespace'=>'Category'],function (){

        Route::get('all', 'CategoryController@category')->name('all');
        Route::post('store', 'CategoryController@store')->name('store');
        Route::get('{id}', 'CategoryController@edit')->name('edit');
        Route::post('{id}', 'CategoryController@update')->name('update');
        Route::post('delete/id', 'CategoryController@destroy')->name('delete');

    });

    /////////////////////////////////////
    /// Brand

    Route::group(['as'=>'brand.','prefix'=>'brand','namespace'=>'Category'],function (){

        Route::get('all', 'BrandController@Brand')->name('all');
        Route::post('store', 'BrandController@store')->name('store');
        Route::get('{id}', 'BrandController@edit')->name('edit');
        Route::post('{id}', 'BrandController@update')->name('update');
        Route::post('delete/id', 'BrandController@destroy')->name('delete');

    });

    Route::group(['as'=>'subCategory.','prefix'=>'sub-category','namespace'=>'Category'],function (){

        Route::get('all', 'SubCategoryController@subCategory')->name('all');
        Route::post('store', 'SubCategoryController@store')->name('store');
        Route::get('{id}', 'SubCategoryController@edit')->name('edit');
        Route::post('{id}', 'SubCategoryController@update')->name('update');
        Route::post('delete/id', 'SubCategoryController@destroy')->name('delete');

    });


    /////////////////////////////////////
    /// Coupon

    Route::group(['as'=>'coupon.','prefix'=>'coupon','namespace'=>'Category'],function (){

        Route::get('all', 'CouponController@coupon')->name('all');
        Route::post('store', 'CouponController@store')->name('store');
        Route::get('{id}', 'CouponController@edit')->name('edit');
        Route::post('{id}', 'CouponController@update')->name('update');
        Route::post('delete/id', 'CouponController@destroy')->name('delete');
        Route::get('newsletters/all', 'CouponController@newsletters')->name('newsletters');
        Route::post('newsletters/delete/id', 'CouponController@deleteNewsletters')->name('delete.newsletters');

    });

    /////////////////////////////////////
    /// Product

    Route::group(['as'=>'product.','prefix'=>'product'],function (){

        Route::get('all', 'ProductController@product')->name('all');
        Route::get('create', 'ProductController@create')->name('create');
        Route::get('get/sub-categories/{category_id}', 'ProductController@getsubcategories')->name('get-subcategories');
        Route::post('store', 'ProductController@store')->name('store');
        Route::post('status/status', 'ProductController@status')->name('status');
        Route::get('product/{id}', 'ProductController@show')->name('show');
        Route::get('{id}', 'ProductController@edit')->name('edit');
        Route::post('{id}', 'ProductController@update')->name('update');
        Route::post('delete/id', 'ProductController@destroy')->name('delete');


    });


    /////////////////////////////////////
    /// Category Blog

    Route::group(['as'=>'blog.category.','prefix'=>'blog/category','namespace'=>'Blog'],function (){

        Route::get('all', 'CategoryController@category')->name('all');
        Route::post('store', 'CategoryController@store')->name('store');
        Route::get('{id}', 'CategoryController@edit')->name('edit');
        Route::post('{id}', 'CategoryController@update')->name('update');
        Route::post('delete/id', 'CategoryController@destroy')->name('delete');

    });


    /////////////////////////////////////
    /// Post Blog

    Route::group(['as'=>'blog.post.','prefix'=>'blog/post','namespace'=>'Blog'],function (){

        Route::get('all', 'PostController@post')->name('all');
        Route::get('create', 'PostController@create')->name('create');
        Route::post('store', 'PostController@store')->name('store');
        Route::get('{id}', 'PostController@edit')->name('edit');
        Route::post('{id}', 'PostController@update')->name('update');
        Route::post('delete/id', 'PostController@destroy')->name('delete');


    });


    /////////////////////////////////////
    /// Orders

    Route::group(['as'=>'order.','prefix'=>'order'],function (){

        Route::get('all', 'OrderController@all')->name('all');
        Route::get('/{id}', 'OrderController@view')->name('view');
        Route::post('accept/{id}', 'OrderController@accept')->name('accept');
        Route::post('cancel/{id}', 'OrderController@cancel')->name('cancel');
        Route::post('process-delivery/{id}', 'OrderController@processDelivery')->name('process-delivery');
        Route::post('delivery-done/{id}', 'OrderController@deliveryDone')->name('delivery-done');


    });

    Route::group(['as'=>'seo.','prefix'=>'seo'],function (){

        Route::get('index', 'SeoController@seo')->name('seo');
        Route::post('update/{id}', 'SeoController@update')->name('update');



    });


    Route::group(['as'=>'report.','prefix'=>'report'],function (){

        Route::get('/{date}/{status}', 'ReportController@report')->name('all');
        Route::get('/search', 'ReportController@search')->name('search');
        Route::post('/search/result', 'ReportController@searchResult')->name('searchResult');


    });


});

