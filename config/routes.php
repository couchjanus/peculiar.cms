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
    'admin/categories/edit/{id}' => 'Admin\CategoryController@edit',
    'admin/categories/delete/{id}' => 'Admin\CategoryController@delete',
];