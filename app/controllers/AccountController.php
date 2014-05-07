<?php

class AccountController extends BaseController {

    /*
     * Return Login View (GET)
     */
    public function getLogin()
    {
        return View::make('account.login');
    }

    /*
     * Login the user (POST)
     */
    public function postLogin()
    {
        //Validate Login form input
        $validator = Validator::make(Input::all(), Account::$rulesLoginForm);

        //Check if form is valid
        if($validator->fails())
        {
            return Redirect::route('account_login')
                ->withErrors($validator)
                ->withInput();
        }
        else //Sign in
        {
            $auth = Auth::attempt([
                'username'     => Input::get('username'),
                'password'  => Input::get('password'),
                'active'    => 1
            ], Input::has('remember'));

            //Attempt to authenticate
            if($auth)
            {
                //Redirect to intended page
                return Redirect::intended('/');
            }
            else //If authentication fails
            {
                return Redirect::route('account_login')
                    ->with('global', 'Username/Password wrong or account not yet activated');
            }
        }

        return Redirect::route('accountLogin')
            ->with('global', 'There was a problem signing you in :(');
    }

    /*
     * Log the user out (GET)
     */
    public function getLogout()
    {
        //Attempt to log user out
        Auth::logout();

        if(!Auth::check())
        {
            return  Redirect::route('home')
                ->with('global', 'You are now logged out');
        }
    }

    /*
     * Change Password (GET)
     */
    public function getChangePassword()
    {
        return View::make('account.changePassword');
    }

    /*
     * Change password (POST)
     */
    public function postChangePassword()
    {
        //Validate input
        $validator = Validator::make(Input::all(), Account::$rulesChangePasswordForm);

        //Check if validation successful
        if($validator->fails())
        {
            return  Redirect::route('account_change_password')
                    ->withErrors($validator);
        }
        else
        {
            //Get authorised user info by id
            $user = User::find(Auth::user()->id);

            //Check if password provided was correct
            if(Hash::check(Input::get('old_password'), $user->getAuthPassword()))
            {
                $user->password = Hash::make(Input::get('password'));

                //Save user, if save successful redirect
                if($user->save())
                {
                    return  Redirect::route('home')
                            ->with('global', 'Your password has been changed');
                }
            }
            else
            {
                return  Redirect::route('account_change_password')
                        ->with('global', 'Your current password was incorrect :(');
            }
        }

        //If all else fails, redirect to the change password page
        return  Redirect::route('account_change_password')
                ->with('global', 'Password could not be changed :(');
    }

    /*
     * Return register user View (GET)
     */
    public function getRegister()
    {
        return View::make('account.register');
    }

    /*
     * register the user (POST)
     */
    public function postRegister()
    {
        //Validate all input with rules
        $validator = Validator::make(Input::all(), Account::$rulesRegisterForm);


        if($validator->fails())
        {
            //Validation failed
            return  Redirect::route('account_register')
                    ->withErrors($validator)
                    ->withInput();
        }
        else
        {
            //register user
            $user = new User;
            $user->email        = Input::get('email');
            $user->username     = Input::get('username');
            $user->password     = Hash::make(Input::get('password'));

            //Activation code
            $user->code         = str_random(10);
            $user->save();

            //If user registerd
            if($user)
            {
                //Send validation email
                Mail::send('emails.auth.activate',
                    ['link'      => URL::route('account_activate', $user->code), 'username'  =>Input::get('username')],
                    function($message)
                    {
                        $message->to(Input::get('email'), Input::get('username'))
                            ->subject('Activate your account');
                    });

                //Redirect home with message
                return Redirect::route('home')
                        ->with('global', 'Your account has been registerd, please check your email to verify');
            }
        }
    }

    /*
     * Activate the user using code (GET)
     */
    public function getActivate($code)
    {
        //Find user with code variable
        $user = User::whereCode($code)
                    ->whereActive(0)
                    ->first();

        //If user is found with code, activate
        if($user)
        {
            //Update user to active state
            $user->active   = 1;
            $user->code     = '';

            //If the changes are made the redirect
            if($user->save())
            {
                return  Redirect::route('home')
                        ->with('global', 'Activation was successful :)');
            }
        }

        dd($user);

//        //Redirect home with message
//        return  Redirect::route('home')
//                ->with('global', 'Activation of your account was unsuccessful or has expired :(');
    }

    /*
     * Handle user forgot password (GET)
     */
    public function getForgotPassword()
    {
        return View::make('account.forgotPassword');
    }

    /*
     * Handle user forgot password (POST)
     */
    public function postForgotPassword()
    {
        $validator = Validator::make(Input::all(), Account::$rulesForgotPassword);

        if($validator->fails())
        {
            return  Redirect::route('account_forgot_password')
                    ->withErrors($validator)
                    ->withInput();
        }
        else
        {
            //Find the user with the email provided
            $user = User::whereEmail(Input::get('email'))
                          ->first();

            //If user exists
            if($user)
            {
                //Add random string to password_temp field
                $code                = str_random(60);
                $password            = str_random(10);

                $user->code          = $code;
                $user->password_temp = Hash::make($password);

                //Attempt to save and redirect
                if($user->save())
                {
                    Mail::send('emails.password.recover', ['link' => URL::route('account_recover_password', $code), 'username' => $user->username, 'password' => $password],
                    function($message) use ($user)
                    {
                        $message->to($user->email, $user->username)->subject('Your new password');
                    });

                    return  Redirect::route('home')
                            ->with('global', 'Please check your email for your new password');
                }
            }
            else //If user does not exist
            {
                return  Redirect::route('account_forgot_password')
                        ->with('global', 'No user with that email exists :(');
            }
        }

        //Redirect home with message
        return  Redirect::route('account_forgot_password')
            ->with('global', 'Could not request new password :(');
    }

    /*
     * Recover password (GET)
     */
    public function getRecoverPassword($code)
    {
        //Find user with code
        $user = User::whereCode($code)
                      ->where('password_temp', '!=', '')
                      ->first();

        //Check if that user exists
        if($user)
        {
            //Change the old password to new one and
            $user->password         = $user->password_temp;
            $user->code             = '';
            $user->password_temp    = '';

            if($user->save())
            {
                return  Redirect::route('home')
                    ->with('global', 'Account has been recovered, please user the new password to login and change password');
            }
        }

        return  Redirect::route('home')
                ->with('global', 'Password recovery did not succeed :(');
    }
}
