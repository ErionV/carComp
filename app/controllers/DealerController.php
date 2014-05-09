<?php

class DealerController extends BaseController
{
	// Dealer registration form (GET)
	public function getDealerRegister()
	{
		return View::make('account.dealer.register');
	}

	// Dealer registration (POST)
	public function postDealerRegister()
	{
		// Assign validation rules
		$validation = Validator::make(Input::all(), Dealer::$rulesRegisterForm);

		//Check if user input is valid
		if($validation->fails())
		{
			//If fails, retry
			return Redirect::route('dealer_register')
				->withErrors($validation)
				->withInput();
		} else
		{
			//Add dealer information
			$dealer = new Dealer;
			$dealer->company_name = strtoupper(Input::get('company_name'));
			$dealer->company_number = Input::get('company_number');
			$dealer->contact_number = Input::get('contact_number');
			$dealer->post_code = str_replace(' ', '', strtoupper(Input::get('post_code')));
			$dealer->about = Input::get('about');
			$dealer->website = Input::get('website');

			//Save dealer information
			$dealer->save();


			//Add dealer user information
			$user = new User;
//            $user->dealer_id        = Dealer::whereCompany_number(Input::get('company_number'))->id;
			$user->username = Input::get('username');
			$user->dealer_id = $dealer->id;
			$user->email = Input::get('email');
			$user->password = Hash::make(Input::get('password'));

			//Activation code
			$user->code = str_random(10);

			// Add user inf to database
			$user->save();

			//If dealer registered
			if($dealer && $user)
			{
				//Send validation email
				Mail::send('emails.auth.activate',
					['link' => URL::route('account_activate', $user->code), 'username' => Input::get('username')],
					function ($message)
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
}
