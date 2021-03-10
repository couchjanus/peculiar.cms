<?php
return [
    '' => 'HomeController@index',
    'shop' => 'CatalogController@index',
    'contact' => 'ContactController@index',
    'blog' => 'BlogController@index',
    'admin' => 'Admin\DashboardController@index',
    'admin/contact' => 'Admin\ContactController@index',
    'admin/contact/list' => 'Admin\ContactController@list',
    'admin/categories' => 'Admin\CategoryController@index',
    'admin/categories/create' => 'Admin\CategoryController@create',
    'admin/categories/store' => 'Admin\CategoryController@store',
    'admin/categories/update' => 'Admin\CategoryController@update',
    'admin/categories/edit/{id}' => 'Admin\CategoryController@edit',
    'admin/categories/delete/{id}' => 'Admin\CategoryController@delete',

    'admin/brands' => 'Admin\BrandController@index',
    'admin/brands/create' => 'Admin\BrandController@create',
    'admin/brands/store' => 'Admin\BrandController@store',
    'admin/brands/update' => 'Admin\BrandController@update',
    'admin/brands/edit/{id}' => 'Admin\BrandController@edit',
    'admin/brands/delete/{id}' => 'Admin\BrandController@delete',

    'admin/products' => 'Admin\ProductController@index',
    'admin/products/create' => 'Admin\ProductController@create',
    'admin/products/store' => 'Admin\ProductController@store',
    'admin/products/update' => 'Admin\ProductController@update',
    'admin/products/edit/{id}' => 'Admin\ProductController@edit',
    'admin/products/delete/{id}' => 'Admin\ProductController@delete',

    'admin/users' => 'Admin\UserController@index',
    'admin/users/create' => 'Admin\UserController@create',
    'admin/users/store' => 'Admin\UserController@store',

    'api/products' => 'HomeController@getProducts',
    'api/cart' => 'OrderController@cart',

    'register' => 'RegisterController@signup',
    'login' => 'LoginController@signin',
    'logout' => 'LoginController@logout',
    'profile' => 'ProfileController@index',
];