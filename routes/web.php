<?php

// user routes.................

route::get('user-home','user\HomeController@index');
route::get('/product_by_category/{id}','user\HomeController@show_product_by_category');
route::get('/product_by_brand/{id}','user\HomeController@show_product_by_brand');
route::get('/product_details/{id}','user\HomeController@product_details');


//cart routes.................................

route::post('/add_to_cart','user\CartController@add_to_cart');
route::get('/show-cart','user\CartController@show_carts')->name('show-cart');
route::get('/delete-cart/{rowId}','user\CartController@delete_carts');
route::post('/update-cart','user\CartController@update_carts');


//checkout routes...................

route::get('user/checkout','user\CheckoutController@checkout')->name('user.checkout');
route::post('user/shiping-details','user\CheckoutController@save_shipping_detail');

//customer route...................

route::get('user/login','user\LoginController@index')->name('user.login');
route::post('user/login','user\LoginController@login');
route::post('user-logout','user\LoginController@logout')->name('user.logout');
route::post('user/registration','user\LoginController@registration');

//user payment route...................
route::get('user/payment','user\PaymentController@payment');

//user order route...................
route::post('user/order_place','user\OrderController@order_place');




// admin routes........................
route::get('admin-home','admin\HomeController@index')->name('admin-home');
route::get('admin-login','admin\LoginController@index')->name('admin.login');
route::post('admin-login','admin\LoginController@login');
route::post('admin-logout','admin\LoginController@logout')->name('admin.logout');

route::resource('admin/profile','admin\ProfileController');
route::resource('admin/category','admin\CategoryController');
route::resource('admin/brand','admin\BrandController');
route::resource('admin/product','admin\ProductController');
route::resource('admin/slider','admin\SliderController');

// admin order route..............
route::get('admin/order','admin\OrderController@all_order');
route::get('admin/order_details/{order_id}','admin\OrderController@view_order');

