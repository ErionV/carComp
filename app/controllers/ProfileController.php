<?php

class ProfileController extends BaseController
{

	public function user()
	{
		if(Auth::check())
		{
			$userUploads = Advert::where('customer_id', Auth::user()->id)
				->paginate(10);

			if($userUploads->count() > 0)
			{
				return View::make('profile.user')
					->with('userUploads', $userUploads);
			}
			else
			{
				return Redirect::route('home')
					->with('global', 'You are not advertising any Cars');
			}
		}
		else
		{
			return Redirect::route('home')
				->with('global', 'You must be logged in to view your adverts');
		}
	}
}
