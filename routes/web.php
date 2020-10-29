<?php


Route::get('/', function () {

    return view('front.home');

    })->name('home');

Route::get('/profile','HomeController@index')->name('profile');

//auth & user
Auth::routes(['verify'=>true]);
Route::get('/password-change', 'HomeController@changePassword')->name('password.change');
Route::post('/password-update', 'HomeController@updatePassword')->name('password.update');
Route::get('/user/logout', 'HomeController@Logout')->name('user.logout');
/////////////////////////////////////////////////////
///


Route::get('add/Wishlist', 'WhishlistController@add')->name('add.wihshList');
Route::get('user/whishlist', 'WhishlistController@all')->name('user.whishlist')->middleware('auth');
//Route::get('remove/Wishlist', 'WhishlistController@remove')->name('remove.wihshList');


/////////////////////////////////////////////////////////////

Route::post('add/cart', 'CartController@add')->name('add.cart');
Route::get('cart/show', 'CartController@show')->name('show.cart');
Route::get('cart/remove', 'CartController@remove')->name('remove.form.cart');
Route::get('cart/destroy', 'CartController@destroy')->name('destroy.cart');
Route::get('cart/qty/update', 'CartController@qtyupdate')->name('qty.update');



///////////////////////////////////////////
Route::get('product/details/{id}', 'ProductController@product')->name('product');
Route::post('product/cart/add', 'ProductController@addCart')->name('product.add.cart');
Route::get('cart/product/view/{id}', 'ProductController@view')->name('product.view.cart');

Route::get('checkout', 'CartController@checkout')->name('user.checkout')->middleware('auth');
Route::get('coupon', 'CartController@coupon')->name('coupon')->middleware('auth');
Route::get('coupon/remove', 'CartController@couponremove')->name('coupon.remove')->middleware('auth');

//////////////*////////////////////////////////////


Route::get('payment/index', 'PaymentController@payment')->name('payment.step');
Route::post('payment/process', 'PaymentController@PaymentProcess')->name('payment.process');
Route::post('payment/stripe', 'PaymentController@stripe')->name('stripe.charge');






Route::get('/cc', function () {

    return Gloudemans\Shoppingcart\Facades\Cart::content();

});

Route::get('/c', function () {

    return \App\Order::all() ;

});




Route::post('/store/news', 'Front\FrontController@storenews')->name('store.newsLetter');
