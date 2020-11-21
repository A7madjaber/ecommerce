<?php

///////////home site
Route::get('/', function () {
    return view('front.home');
})->name('home');

Route::get('login/{provider}', 'SocialLoginController@redirect');

Route::get('{provider}/callback','SocialLoginController@Callback');


//auth & user
Auth::routes(['verify'=>true]);
Route::get('password-change', 'HomeController@changePassword')->name('password.change');
Route::post('password-update', 'HomeController@updatePassword')->name('password.update');
Route::get('user/logout', 'HomeController@Logout')->name('user.logout');
Route::get('profile','HomeController@index')->name('profile');
Route::get('profile/edit','HomeController@profileEdit')->name('edit.profile');
Route::post('profile/edit','HomeController@profileUpdate')->name('edit.profile');

//Blog
/////////////////////////////////////////////////////

Route::get('blog', 'Front\FrontController@posts')->name('blog.posts');
Route::get('blog/post/{id}', 'Front\FrontController@post')->name('post');

//////////////////////////////////Wishlist

Route::get('add/Wishlist', 'Front\WhishlistController@add')->name('add.wihshList');
Route::get('user/whishlist', 'Front\WhishlistController@all')->name('user.whishlist')->middleware('auth');
Route::get('remove/Wishlist/{id}', 'Front\WhishlistController@remove')->name('remove.wihshList')->middleware('auth');


///////////////////////CArt///////////////////////////////

Route::post('add/cart', 'Front\CartController@add')->name('add.cart');
Route::get('cart/show', 'Front\CartController@show')->name('show.cart');
Route::get('cart/remove', 'Front\CartController@remove')->name('remove.form.cart');
Route::get('cart/destroy', 'Front\CartController@destroy')->name('destroy.cart');
Route::get('cart/qty/update', 'Front\CartController@qtyupdate')->name('qty.update');

///////////////////////checkout && Coupon//////////////////////////////////////////////////////////////////////////////
Route::get('checkout', 'Front\CartController@checkout')->name('user.checkout')->middleware('auth');
Route::get('coupon', 'Front\CartController@coupon')->name('coupon')->middleware('auth');
Route::get('coupon/remove', 'Front\CartController@couponremove')->name('coupon.remove')->middleware('auth');



///////////////////////////Product Details
Route::get('product/details/{id}', 'Front\ProductController@product')->name('product');
Route::post('product/cart/add', 'Front\ProductController@addCart')->name('product.add.cart');
Route::get('cart/product/view/{id}', 'Front\ProductController@view')->name('product.view.cart');
///////shop/////////////
Route::post('product/search', 'Front\ProductController@search')->name('product.search');
Route::get('product/subcategory/{id}', 'Front\ProductController@subcategory')->name('product.subcategory');
Route::get('product/category/{id}', 'Front\ProductController@category')->name('product.category');
Route::get('product/brand/{id}', 'Front\ProductController@brand')->name('product.brand');




 //////////////////////payment//////////////////
Route::get('payment', 'Front\PaymentController@payment')->name('payment.step');
Route::post('payment/process', 'Front\PaymentController@PaymentProcess')->name('payment.process');
Route::post('payment/stripe', 'Front\PaymentController@stripe')->name('stripe.charge');




Route::post('subscribe/news', 'Front\FrontController@subscribenewsLetter')->name('subscribe.newsLetter');

Route::post('track/order', 'Front\FrontController@track')->name('order.tracking');

Route::get('return/orders/list', 'Front\FrontController@returnOrderList')->name('return.order.list');
Route::get('return/order/{id}', 'Front\FrontController@returnOrder')->name('return.order');

route::get('contact','Front\FrontController@contact')->name('contact');
route::post('contact','Front\FrontController@contactSend')->name('contact.send');
//

route::get('rating','Front\FrontController@rating')->name('rating');


