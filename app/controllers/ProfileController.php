<?php

class ProfileController extends BaseController
{

	public function user($username)
	{
//		$user = User::whereUsername($username);
//
//		if($user->count())
//		{
//			$user = $user->first();
//
//			return View::make('profile.user', compact('user'));
//		}
//
//		return App::abort(404);


		$userUploads = Advert::where('customer_id', Auth::user()->id)
					->paginate(10);

		if(count($userUploads))
		{
			$user = User::whereUsername($username);

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
				->with('global', 'You are currently not WATCHING any cars.');
		}
	}
}
