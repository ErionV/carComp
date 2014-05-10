<?php

//Home page (GET)
Route::get('/', [
	'as' => 'home',
	'uses' => 'HomeController@getHome'
]);

//Advert Search (GET)
Route::get('/search/', [
	'as' => 'ad_search',
	'uses' => 'AdvertController@getSearch'
]);

//Show user profile (GET)
Route::get('/user/', [
	'as' => 'profile_user',
	'uses' => 'ProfileController@user'
]);

//View car advert with id (GET)
Route::get('/ad/{id}', [
	'as' => 'view_advert_get',
	'uses' => 'AdvertController@getViewAdvert'
]);

Route::get('404-error', function ()
{
	return View::make('error.404error');
});

//////////////////////////////////////////////////////////////////////////
//Unauthenticated group
//////////////////////////////////////////////////////////////////////////
Route::group(['before' => 'guest'], function ()
{
	//Log in Form (GET)
	Route::get('/account/login', [
		'as' => 'account_login',
		'uses' => 'AccountController@getLogin'
	]);

	//Register account (GET)
	Route::get('/account/register', [
		'as' => 'account_register',
		'uses' => 'AccountController@getRegister'
	]);

	//Activate user using code (GET)
	Route::get('/account/activate/{code}', [
		'as' => 'account_activate',
		'uses' => 'AccountController@getActivate'
	]);

	//Activate dealer using code (GET)
	Route::get('/dealer/activate/{code}', [
		'as' => 'dealer_activate',
		'uses' => 'DealerController@getActivate'
	]);

	//Forgot password (GET)
	Route::get('/account/forgot-password', [
		'as' => 'account_forgot_password',
		'uses' => 'AccountController@getForgotPassword'
	]);

	//Reset password (GET)
	Route::get('/account/recover/{code}', [
		'as' => 'account_recover_password',
		'uses' => 'AccountController@getRecoverPassword'
	]);

	//Dealer Registration (GET)
	Route::get('/dealer/register', [
		'as' => 'dealer_register',
		'uses' => 'DealerController@getDealerRegister'
	]);

	//CSRF protection group
	Route::group(['before' => 'csrf'], function ()
	{
		//Login user (POST)
		Route::post('/account/login', [
			'as' => 'account_login_post',
			'uses' => 'AccountController@postLogin'
		]);

		//Register account (POST)
		Route::post('/account/register', [
			'as' => 'account_register_post',
			'uses' => 'AccountController@postregister'
		]);

		//Forgot password (POST)
		Route::post('/account/forgot-password', [
			'as' => 'account_forgot_password_post',
			'uses' => 'AccountController@postForgotPassword'
		]);

		//Forgot password (POST)
		Route::post('/dealer/register', [
			'as' => 'dealer_register_post',
			'uses' => 'DealerController@postDealerRegister'
		]);

	});
});


//////////////////////////////////////////////////////////////////////////
//Authenticated group
//////////////////////////////////////////////////////////////////////////
Route::group(['before' => 'auth'], function ()
{
	//CSRF protection group
	Route::group(['before' => 'csrf'], function ()
	{
		//Change Password (POST)
		Route::post('/account/changePassword', [
			'as' => 'account_change_password_post',
			'uses' => 'AccountController@postChangePassword'
		]);

		//Post advert (POST)
		Route::post('/postad', [
			'as' => 'post_postad',
			'uses' => 'AdvertController@postPostAdvert'
		]);
	});

	//View car advert with id (GET)
	Route::get('/ad/remove/{id}', [
		'as' => 'get_remove_ad',
		'uses' => 'AdvertController@getRemoveAdvert'
	]);

	/////////////////////////////////
	//Comparison Routes
	/////////////////////////////////
	//Add cars to comparison (GET)
	Route::get('/compare/{id}', [
		'as' => 'ad_compare',
		'uses' => 'AdvertController@getAddAdvertCompare'
	]);

	//Remove car from Comparison page (GET)
	Route::get('/compare/remove/{id}', [
		'as' => 'ad_compare_remove',
		'uses' => 'AdvertController@getAdvertCompareRemove'
	]);

	//View Comparison page (GET)
	Route::get('/compare/', [
		'as' => 'ad_compare_view',
		'uses' => 'AdvertController@getAdvertCompareView'
	]);

	/////////////////////////////////
	//Watch Routes
	/////////////////////////////////
	//View Watch List (GET)
	Route::get('/watchlist/', [
		'as' => 'get_watchList',
		'uses' => 'AdvertController@getWatchListView'
	]);

	//Remove car from Watch List (GET)
	Route::get('/watchlist/remove/{id}', [
		'as' => 'get_watchRemove',
		'uses' => 'AdvertController@getWatchRemove'
	]);

	//Add car to watch (GET)
	Route::get('/watch/{id}', [
		'as' => 'watch_advert',
		'uses' => 'AdvertController@getAddWatch'
	]);

	/////////////////////////////////
	//Account Routes
	/////////////////////////////////
	//Log out (GET)
	Route::get('/account/logout', [
		'as' => 'account_logout',
		'uses' => 'AccountController@getLogout'
	]);

	//Change Password (GET)
	Route::get('/account/changePassword', [
		'as' => 'account_change_password',
		'uses' => 'AccountController@getChangePassword'
	]);

	//Post new add (GET)
	Route::get('/postad', [
		'as' => 'get_postad',
		'uses' => 'AdvertController@getPostAdvert'
	]);
});