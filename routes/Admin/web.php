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

        Route::get('all', 'CategoryController@index')->name('all');
        Route::post('store', 'CategoryController@store')->name('store');
        Route::get('{id}', 'CategoryController@edit')->name('edit');
        Route::post('{id}', 'CategoryController@update')->name('update');
        Route::post('delete/id', 'CategoryController@destroy')->name('delete');

    });

    /////////////////////////////////////
    /// Brand

    Route::group(['as'=>'brand.','prefix'=>'brand','namespace'=>'Category'],function (){

        Route::get('all', 'BrandController@index')->name('all');
        Route::post('store', 'BrandController@store')->name('store');
        Route::get('{id}', 'BrandController@edit')->name('edit');
        Route::post('{id}', 'BrandController@update')->name('update');
        Route::post('delete/id', 'BrandController@destroy')->name('delete');

    });

    Route::group(['as'=>'subCategory.','prefix'=>'sub-category','namespace'=>'Category'],function (){

        Route::get('all', 'SubCategoryController@index')->name('all');
        Route::post('store', 'SubCategoryController@store')->name('store');
        Route::get('{id}', 'SubCategoryController@edit')->name('edit');
        Route::post('{id}', 'SubCategoryController@update')->name('update');
        Route::post('delete/id', 'SubCategoryController@destroy')->name('delete');

    });


    /////////////////////////////////////
    /// Coupon

    Route::group(['as'=>'coupon.','prefix'=>'coupon','namespace'=>'Category'],function (){

        Route::get('all', 'CouponController@index')->name('all');
        Route::post('store', 'CouponController@store')->name('store');
        Route::get('{id}', 'CouponController@edit')->name('edit');
        Route::post('{id}', 'CouponController@update')->name('update');
        Route::post('delete/id', 'CouponController@destroy')->name('delete');
        Route::get('newsletters/all', 'CouponController@newsletters')->name('newsletters');
        Route::post('newsletters/delete', 'CouponController@deleteNewsletters')->name('delete.newsletters');
        Route::delete('newsletters/delete/all', 'CouponController@deleteNewslettersAll')->name('delete.newsletters.all');
        Route::get('coupon/{id}', 'CouponController@sendCoupon')->name('sendCoupon');

    });

    /////////////////////////////////////
    /// Product

    Route::group(['as'=>'product.','prefix'=>'product'],function (){

        Route::get('all', 'ProductController@index')->name('all');
        Route::get('create', 'ProductController@create')->name('create');
        Route::get('get/sub-categories/{category_id}', 'ProductController@getsubcategories')->name('get-subcategories'); /////get subcategories
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

        Route::get('all', 'CategoryController@index')->name('all');
        Route::post('store', 'CategoryController@store')->name('store');
        Route::get('{id}', 'CategoryController@edit')->name('edit');
        Route::post('{id}', 'CategoryController@update')->name('update');
        Route::post('delete/id', 'CategoryController@destroy')->name('delete');

    });


    /////////////////////////////////////
    /// Post Blog

    Route::group(['as'=>'blog.post.','prefix'=>'blog/post','namespace'=>'Blog'],function (){

        Route::get('all', 'PostController@index')->name('all');
        Route::get('create', 'PostController@create')->name('create');
        Route::post('store', 'PostController@store')->name('store');
        Route::get('{id}', 'PostController@edit')->name('edit');
        Route::post('{id}', 'PostController@update')->name('update');
        Route::post('delete/id', 'PostController@destroy')->name('delete');


    });


    /////////////////////////////////////
    /// Orders

    Route::group(['as'=>'order.','prefix'=>'order'],function (){

        Route::get('all', 'OrderController@index')->name('all');
        Route::get('/{id}', 'OrderController@view')->name('view');
        Route::post('accept/{id}', 'OrderController@accept')->name('accept');
        Route::post('cancel/{id}', 'OrderController@cancel')->name('cancel');
        Route::post('process-delivery/{id}', 'OrderController@processDelivery')->name('process-delivery');
        Route::post('delivery-done/{id}', 'OrderController@deliveryDone')->name('delivery-done');
        Route::get('return/all', 'OrderController@return')->name('return');
        Route::post('return/approve', 'OrderController@returnApprove')->name('return.approve');


    });

    Route::group(['as'=>'seo.','prefix'=>'seo'],function (){

        Route::get('index', 'SeoController@index')->name('seo');
        Route::post('update/{id}', 'SeoController@update')->name('update');



    });


    Route::group(['as'=>'report.','prefix'=>'report'],function (){

        Route::get('/{date}/{status}', 'ReportController@report')->name('all');
        Route::get('/search', 'ReportController@search')->name('search');
        Route::post('/search/result', 'ReportController@searchResult')->name('searchResult');


    });

    Route::group(['as'=>'settings.','prefix'=>'settings'],function (){
        Route::get('site', 'SettingController@index')->name('settings');
        Route::post('update/{id}', 'SettingController@update')->name('update');



    });

    Route::group(['as'=>'message.','prefix'=>'message'],function (){
        Route::get('/all', 'MessageController@index')->name('all');
        Route::get('/{id}', 'MessageController@show')->name('show');
        Route::post('replay', 'MessageController@replay')->name('replay');



    });

    Route::group(['as'=>'deal.','prefix'=>'deal'],function (){
        Route::get('all', 'HotDealController@index')->name('all');
        Route::get('new', 'HotDealController@create')->name('new');
        Route::get('get/product/{product_id}', 'HotDealController@getproduct')->name('getProduct'); /////get subcategories
        Route::post('store', 'HotDealController@store')->name('store');
        Route::get('{id}', 'HotDealController@edit')->name('edit');
        Route::post('{id}', 'HotDealController@update')->name('update');
        Route::post('delete/id', 'HotDealController@destroy')->name('delete');

    });



    Route::group(['as'=>'role.','prefix'=>'roles'],function (){
        Route::get('all', 'RoleController@index')->name('all');
        Route::get('create', 'RoleController@create')->name('create');
        Route::post('store', 'RoleController@store')->name('store');
        Route::get('{id}', 'RoleController@edit')->name('edit');
        Route::post('{id}', 'RoleController@update')->name('update');
        Route::post('delete/id', 'RoleController@destroy')->name('delete');

    });

    Route::group(['as'=>'admin.','prefix'=>'admins'],function (){
        Route::get('all', 'AdminController@admin')->name('all');
        Route::get('create', 'AdminController@create')->name('create');
        Route::post('store', 'AdminController@store')->name('store');
        Route::get('{id}', 'AdminController@edit')->name('edit');
        Route::post('{id}', 'AdminController@update')->name('update');
        Route::post('delete/id', 'AdminController@destroy')->name('delete');

    });

    Route::group(['as'=>'profile.','prefix'=>'profile'],function (){
        Route::get('', 'ProfileController@index')->name('index');
        Route::post('', 'ProfileController@update')->name('update');

    });
});

