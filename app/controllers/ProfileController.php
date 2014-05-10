<?php

class ProfileController extends BaseController
{

	public function user()
	{
		if(Auth::check())
		{
			$userUploads = Advert::where('customer_id', Auth::user()->id)
				->paginate(10);

			$user = User::whereUsername(Auth::user()->username);

			if($user->count())
			{
				$user = $user->first();

				return View::make('profile.user')
					->with('user', $user)
					->with('userUploads', $userUploads);
			}

		}
		else
		{
			return Redirect::route('home')
				->with('global', 'You must be logged in to view your adverts');
		}
	}
}
