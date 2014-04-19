<?php
/*
* Home page (GET)
*/
Route::get('/', [
    'as'    => 'home',
    'uses'  => 'HomeController@home'
]);

Route::get('/search', [
    'as'    => 'get_search',
    'uses'  => 'SearchController@getSearch'
]);

/*
 * Show user profile (GET)
 */
Route::get('/user/{username}', [
    'as'        => 'profile_user',
    'uses'      => 'ProfileController@user'
]);

/*
* View car advert with id (GET)
*/
Route::get('/ad/{id}', [
    'as'    => 'view_advert_get',
    'uses'  => 'AdvertController@getViewAdvert'
]);






/*  //////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////
 * Unauthenticated group
 */
Route::group(['before' => 'guest'], function()
{
    /*
 * Log in Form (GET)
 */
    Route::get('/account/login', [
        'as'    => 'account_login',
        'uses'  => 'AccountController@getLogin'
    ]);

    /*
     * Register account (GET)
     */
    Route::get('/account/register', [
        'as'    => 'account_register',
        'uses'  => 'AccountController@getRegister'
    ]);

    /*
     * Activate user using code (GET)
     */
    Route::get('/account/activate/{code}', [
        'as'    => 'account_activate',
        'uses'  => 'AccountController@getActivate'
    ]);

    /*
     * Activate dealer using code (GET)
     */
    Route::get('/dealer/activate/{code}', [
        'as'    => 'dealer_activate',
        'uses'  => 'DealerController@getActivate'
    ]);

    /*
     * Forgot password (GET)
     */
    Route::get('/account/forgot-password', [
        'as'    => 'account_forgot_password',
        'uses'  => 'AccountController@getForgotPassword'
    ]);

    /*
     * Reset password (GET)
     */
    Route::get('/account/recover/{code}', [
        'as'    => 'account_recover_password',
        'uses'  => 'AccountController@getRecoverPassword'
    ]);

    /*
     * Dealer Registration (GET)
     */
    Route::get('/dealer/register', [
        'as'    => 'dealer_register',
        'uses'  => 'DealerController@getDealerRegister'
    ]);

    /*
     * CSRF protection group
     */
    Route::group(['before' => 'csrf'], function()
    {
        /*
         * Login user (POST)
         */
        Route::post('/account/login', [
            'as'    => 'account_login_post',
            'uses'  => 'AccountController@postLogin'
        ]);

        /*
         * Register account (POST)
         */
        Route::post('/account/register', [
            'as'    => 'account_register_post',
            'uses'  => 'AccountController@postregister'
        ]);

        /*
         * Forgot password (POST)
         */
        Route::post('/account/forgot-password', [
            'as'    => 'account_forgot_password_post',
            'uses'  => 'AccountController@postForgotPassword'
        ]);

        /*
         * Forgot password (POST)
         */
        Route::post('/dealer/register', [
            'as'    => 'dealer_register_post',
            'uses'  => 'DealerController@postDealerRegister'
        ]);

    });
});


/* //////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////
 * Authenticated group
 */
Route::group(['before' => 'auth'], function()
{
    /*
     * CSRF protection group
     */
    Route::group(['before' => 'csrf'], function()
    {
        /*
        * Change Password (POST)
        */
        Route::post('/account/changePassword', [
            'as'        => 'account_change_password_post',
            'uses'      => 'AccountController@postChangePassword'
        ]);

        /*
         * Post advert (POST)
         */
        Route::post('/postad', [
            'as'    => 'post_postad',
            'uses'  => 'AdvertController@postPostAdvert'
        ]);
    });

    /*
     * Log out (GET)
     */
    Route::get('/account/logout', [
        'as'        => 'account_logout',
        'uses'      => 'AccountController@getLogout'
    ]);

    /*
     * Change Password (GET)
     */
    Route::get('/account/changePassword', [
        'as'        => 'account_change_password',
        'uses'      => 'AccountController@getChangePassword'
    ]);

    /*
    * Post new add (GET)
    */
    Route::get('/postad', [
        'as'    => 'get_postad',
        'uses'  => 'AdvertController@getPostAdvert'
    ]);
});