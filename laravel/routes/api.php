<?php

use Illuminate\Http\Request;

Route::group(['middleware' => 'api'], function () {
# login and register routes
Route::post('login', 'SharedControllers\AuthController@login');
Route::post('signup', 'SharedControllers\AuthController@register');
Route::get('test', 'TestController@test');

#contact routes
Route::post('insertContact', 'SharedControllers\ContactController@insertContact');

# get products routes
Route::get('allProducts', 'SharedControllers\ProductsController@allProducts');
Route::get('menProducts', 'SharedControllers\ProductsController@menProducts');
Route::get('womenProducts', 'SharedControllers\ProductsController@womenProducts');
Route::get('kidsProducts', 'SharedControllers\ProductsController@kidsProducts');
Route::get('sportsProducts', 'SharedControllers\ProductsController@sportsProducts');
Route::get('nameAscProducts', 'SharedControllers\ProductsController@sortNameAscProducts');
Route::get('nameDescProducts', 'SharedControllers\ProductsController@sortNameDescProducts');
Route::get('priceAscProducts', 'SharedControllers\ProductsController@sortPriceAscProducts');
Route::get('priceDescProducts', 'SharedControllers\ProductsController@sortPriceDescProducts');
Route::get('productDetails/{id}', 'SharedControllers\ProductsController@productDetails');

#sorting data for all brands and categories
    Route::get('menNameAscProducts', 'SharedControllers\ProductsController@menSortNameAscProducts');
    Route::get('menNameDescProducts', 'SharedControllers\ProductsController@menSortNameDescProducts');
    Route::get('menPriceAscProducts', 'SharedControllers\ProductsController@menSortPriceAscProducts');
    Route::get('menPriceDescProducts', 'SharedControllers\ProductsController@menSortPriceDescProducts');
    Route::get('womenNameAscProducts', 'SharedControllers\ProductsController@womenSortNameAscProducts');
    Route::get('womenNameDescProducts', 'SharedControllers\ProductsController@womenSortNameDescProducts');
    Route::get('womenPriceAscProducts', 'SharedControllers\ProductsController@womenSortPriceAscProducts');
    Route::get('womenPriceDescProducts', 'SharedControllers\ProductsController@womenSortPriceDescProducts');
    Route::get('kidsNameAscProducts', 'SharedControllers\ProductsController@kidsSortNameAscProducts');
    Route::get('kidsNameDescProducts', 'SharedControllers\ProductsController@kidsSortNameDescProducts');
    Route::get('kidsPriceAscProducts', 'SharedControllers\ProductsController@kidsSortPriceAscProducts');
    Route::get('kidsPriceDescProducts', 'SharedControllers\ProductsController@kidsSortPriceDescProducts');
    Route::get('sportsNameAscProducts', 'SharedControllers\ProductsController@sportsSortNameAscProducts');
    Route::get('sportsNameDescProducts', 'SharedControllers\ProductsController@sportsSortNameDescProducts');
    Route::get('sportsPriceAscProducts', 'SharedControllers\ProductsController@sportsSortPriceAscProducts');
    Route::get('sportsPriceDescProducts', 'SharedControllers\ProductsController@sportsSortPriceDescProducts');


    Route::get('nikeNameAscProducts', 'SharedControllers\ProductsController@nikeSortNameAscProducts');
    Route::get('nikeNameDescProducts', 'SharedControllers\ProductsController@nikeSortNameDescProducts');
    Route::get('nikePriceAscProducts', 'SharedControllers\ProductsController@nikeSortPriceAscProducts');
    Route::get('nikePriceDescProducts', 'SharedControllers\ProductsController@nikeSortPriceDescProducts');
    Route::get('adidasNameAscProducts', 'SharedControllers\ProductsController@adidasSortNameAscProducts');
    Route::get('adidasNameDescProducts', 'SharedControllers\ProductsController@adidasSortNameDescProducts');
    Route::get('adidasPriceAscProducts', 'SharedControllers\ProductsController@adidasSortPriceAscProducts');
    Route::get('adidasPriceDescProducts', 'SharedControllers\ProductsController@adidasSortPriceDescProducts');
    Route::get('reebokNameAscProducts', 'SharedControllers\ProductsController@reebokSortNameAscProducts');
    Route::get('reebokNameDescProducts', 'SharedControllers\ProductsController@reebokSortNameDescProducts');
    Route::get('reebokPriceAscProducts', 'SharedControllers\ProductsController@reebokSortPriceAscProducts');
    Route::get('reebokPriceDescProducts', 'SharedControllers\ProductsController@reebokSortPriceDescProducts');
    Route::get('asicsNameAscProducts', 'SharedControllers\ProductsController@asicsSortNameAscProducts');
    Route::get('asicsNameDescProducts', 'SharedControllers\ProductsController@asicsSortNameDescProducts');
    Route::get('asicsPriceAscProducts', 'SharedControllers\ProductsController@asicsSortPriceAscProducts');
    Route::get('asicsPriceDescProducts', 'SharedControllers\ProductsController@asicsSortPriceDescProducts');
    Route::get('pumaNameAscProducts', 'SharedControllers\ProductsController@pumaSortNameAscProducts');
    Route::get('pumaNameDescProducts', 'SharedControllers\ProductsController@pumaSortNameDescProducts');
    Route::get('pumaPriceAscProducts', 'SharedControllers\ProductsController@pumaSortPriceAscProducts');
    Route::get('pumaPriceDescProducts', 'SharedControllers\ProductsController@pumaSortPriceDescProducts');
    Route::get('nbNameAscProducts', 'SharedControllers\ProductsController@nbSortNameAscProducts');
    Route::get('nbNameDescProducts', 'SharedControllers\ProductsController@nbSortNameDescProducts');
    Route::get('nbPriceAscProducts', 'SharedControllers\ProductsController@nbSortPriceAscProducts');
    Route::get('nbPriceDescProducts', 'SharedControllers\ProductsController@nbSortPriceDescProducts');
    Route::get('hummelNameAscProducts', 'SharedControllers\ProductsController@hummelSortNameAscProducts');
    Route::get('hummelNameDescProducts', 'SharedControllers\ProductsController@hummelSortNameDescProducts');
    Route::get('hummelPriceAscProducts', 'SharedControllers\ProductsController@hummelSortPriceAscProducts');
    Route::get('hummelPriceDescProducts', 'SharedControllers\ProductsController@hummelSortPriceDescProducts');


# get product brands routes
Route::get('nikeProducts', 'SharedControllers\ProductsController@nikeProducts');
Route::get('adidasProducts', 'SharedControllers\ProductsController@adidasProducts');
Route::get('asicsProducts', 'SharedControllers\ProductsController@asicsProducts');
Route::get('pumaProducts', 'SharedControllers\ProductsController@pumaProducts');
Route::get('reebokProducts', 'SharedControllers\ProductsController@reebokProducts');
Route::get('nbProducts', 'SharedControllers\ProductsController@nbProducts');
Route::get('hummelProducts', 'SharedControllers\ProductsController@hummelProducts');

    # cart routes
    Route::post('addToCart', 'SharedControllers\CartController@addToCart');
    Route::get('showUserCart/{id}', 'SharedControllers\CartController@showUserCart');
    Route::post('deleteUserItem', 'SharedControllers\CartController@deleteUserItem');
    Route::get('showItem/{id}', 'SharedControllers\CartController@showItem');
    Route::post('updateItem/{id}', 'SharedControllers\CartController@updateItem');

    # checkout routes
    Route::post('checkout', 'SharedControllers\CartController@checkout');

    # profile route
    Route::get('profile/{id}', 'SharedControllers\UsersController@getUser');
    Route::get('profileCheckout/{id}', 'SharedControllers\UsersController@getUserCheckout');

    #like route
    Route::post('like', 'SharedControllers\LikesController@like');


    #admin routes

    #admin categories
    Route::get('adminCategoriesIndex', 'ProtectedControllers\AdminCategoriesController@categoriesIndex');
    Route::post('adminCategoryStore', 'ProtectedControllers\AdminCategoriesController@categoryStore');
    Route::post('adminCategoryDelete', 'ProtectedControllers\AdminCategoriesController@categoryDelete');

    #admin brands
    Route::get('adminBrandsIndex', 'ProtectedControllers\AdminBrandsController@brandsIndex');
    Route::post('adminBrandStore', 'ProtectedControllers\AdminBrandsController@brandStore');
    Route::post('adminBrandDelete', 'ProtectedControllers\AdminBrandsController@brandDelete');

    #admin trackings
    Route::get('adminTrackingsIndex', 'ProtectedControllers\AdminTrackingsController@getAllCheckouts');
    Route::post('adminTrackingDeleteOne', 'ProtectedControllers\AdminTrackingsController@deleteOne');
    Route::post('adminTrackingDeleteAll', 'ProtectedControllers\AdminTrackingsController@deleteAll');
    Route::get('adminTrackingsIndexDelivered', 'ProtectedControllers\AdminTrackingsController@getDelivered');
    Route::post('adminTrackingDeliver', 'ProtectedControllers\AdminTrackingsController@makeDeliver');

    #admin contacts
    Route::get('adminContactQuestions', 'ProtectedControllers\AdminContactsController@getAllContacts');
    Route::get('adminContactAnswers', 'ProtectedControllers\AdminContactsController@getAllAnswers');
    Route::post('insertAnswer', 'ProtectedControllers\AdminContactsController@insertAnswer');
    Route::post('deleteContact', 'ProtectedControllers\AdminContactsController@deleteContact');
    Route::post('deleteAnswer', 'ProtectedControllers\AdminContactsController@deleteAnswer');

    #admin users
    Route::get('adminUsersIndex', 'ProtectedControllers\AdminUsersController@usersIndex');
    Route::get('adminUserGetOne/{id}', 'ProtectedControllers\AdminUsersController@getOneUser');
    Route::post('adminUserStore', 'ProtectedControllers\AdminUsersController@userStore');
    Route::post('adminUserDelete', 'ProtectedControllers\AdminUsersController@delete');
    Route::post('adminUserUpdate/{id}', 'ProtectedControllers\AdminUsersController@userUpdate');

    #admin products
    Route::post('adminProductStore', 'ProtectedControllers\AdminProductsController@storeProduct');
    Route::get('adminProductsIndex', 'ProtectedControllers\AdminProductsController@productsIndex');
    Route::post('adminProductDelete', 'ProtectedControllers\AdminProductsController@deleteProduct');
    Route::get('adminOneProduct/{id}', 'ProtectedControllers\AdminProductsController@getOneProduct');
    Route::post('adminUpdateProduct/{id}', 'ProtectedControllers\AdminProductsController@updateProduct');

});
