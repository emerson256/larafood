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

Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => 'auth'], function () {

    /**
     * Routes Tables
     */
    Route::get('tables/qrcode/{identify}', 'TableController@qrcode')->name('tables.qrcode');
    Route::any('tables/search', 'TableController@search')->name('tables.search');
    Route::resource('tables', 'TableController');

    /**
     * Product x Category
     */
    Route::get('products/{id}/category/{idCategory}/detach', 'CategoryProductController@detachCategoryProduct')->name('products.category.detach');
    Route::post('products/{id}/categories', 'CategoryProductController@attachCategoriesProduct')->name('products.categories.attach');
    Route::any('products/{id}/categories/create', 'CategoryProductController@categoriesAvailable')->name('products.categories.available');
    Route::get('products/{id}/categories', 'CategoryProductController@categories')->name('products.categories');
    Route::get('categories/{id}/products', 'CategoryProductController@products')->name('categories.products');

    /**
     * Routes Products
     */
    Route::any('products/search', 'ProductController@search')->name('products.search');
    Route::resource('products', 'ProductController');

    /**
     * Routes Categories
     */
    Route::any('categories/search', 'CategoryController@search')->name('categories.search');
    Route::resource('categories', 'CategoryController');

    /**
     * Routes Users
     */
    Route::any('users/search', 'UserController@search')->name('users.search');
    Route::resource('users', 'UserController');

    /**
     * Plan  x Profile
     */

    Route::get('plans/{id}/permission/{idProfile}/detach', 'ACL\PlanProfileController@detacPlanProfile')->name('plans.profile.detach');
    Route::post('plans/{id}/profiles', 'ACL\PlanProfileController@attachProfilesPlan')->name('plans.profiles.attach');
    Route::any('plans/{id}/profiles/create', 'ACL\PlanProfileController@profilesAvailable')->name('plans.profiles.available');
    Route::get('plans/{id}/profiles', 'ACL\PlanProfileController@profiles')->name('plans.profiles');
    Route::get('profiles/{id}/plans', 'ACL\PlanProfileController@plans')->name('profiles.plans');


    /**
     * Permission x Profile
     */

    Route::get('profiles/{id}/permission/{idPermission}/detach', 'ACL\PermissionProfileController@detachPermissionsProfile')->name('profiles.permissions.detach');
    Route::post('profiles/{id}/permissions', 'ACL\PermissionProfileController@attachPermissionsProfile')->name('profiles.permissions.attach');
    Route::any('profiles/{id}/permissions/create', 'ACL\PermissionProfileController@permissionsAvailable')->name('profiles.permissions.available');
    Route::get('profiles/{id}/permissions', 'ACL\PermissionProfileController@permissions')->name('profiles.permissions');
    Route::get('permissions/{id}/profiles', 'ACL\PermissionProfileController@profiles')->name('permissions.profiles');

    /**
     * Routes Permissions
     */
    Route::any('permissions/search', 'ACL\PermissionController@search')->name('permissions.search');
    Route::resource('permissions', 'ACL\PermissionController');

    /**
     * Routes Profiles
     */
    Route::any('profiles/search', 'ACL\ProfileController@search')->name('profiles.search');
    Route::resource('profiles', 'ACL\ProfileController');

    /**
     * Routes Details Plans
     */

    Route::get('plans/{url}/details', 'DetailPlanController@index')->name('details.plan.index');
    Route::get('plans/{url}/details/create', 'DetailPlanController@create')->name('details.plan.create');
    Route::delete('plans/{url}/details/{idDetail}', 'DetailPlanController@destroy')->name('details.plan.destroy');
    Route::get('plans/{url}/details/{idDetail}', 'DetailPlanController@show')->name('details.plan.show');
    Route::get('plans/{url}/details/{idDetail}/edit', 'DetailPlanController@edit')->name('details.plan.edit');
    Route::put('plans/{url}/details/{idDetail}/', 'DetailPlanController@update')->name('details.plan.update');
    Route::post('plans/{url}/details', 'DetailPlanController@store')->name('details.plan.store');

    /**
     * Routes Plans
     */
    Route::any('plans/search', 'PlanController@search')->name('plans.search');
    Route::put('plans/{url}', 'PlanController@update')->name('plans.update');
    Route::delete('plans/{url}', 'PlanController@destroy')->name('plans.destroy');
    Route::get('plans/create', 'PlanController@create')->name('plans.create');
    Route::get('plans/{url}/edit', 'PlanController@edit')->name('plans.edit');
    Route::get('plans/{url}', 'PlanController@show')->name('plans.show');
    Route::post('plans/', 'PlanController@store')->name('plans.store');
    Route::get('plans', 'PlanController@index')->name('plans.index');

    /**
     * Home Dashboard
     */

    Route::get('/', 'PlanController@index')->name('admin.index');
});

/**
 * Site
 */
Route::get('plan/{url}', 'Site\SiteController@plan')->name('plan.subscription');
Route::get('/', 'Site\SiteController@index')->name('site.home');

/**
 * Auth Routes
 */
Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
