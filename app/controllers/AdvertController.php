<?php

class AdvertController extends BaseController
{
	/*
	* Return post advert View (GET)
	*/
	public function getPostAdvert()
	{
		//Creates array of all data in car_makes table for dropdown list
		$car_make_list = [ CarMakes::orderBy('car_make', 'asc')
			->lists('car_make', 'car_make'), '' => 'Make '];

		return View::make('advert.postAdvert')
			->with('car_make_list', $car_make_list);
	}

	/*
	 * Handle the POST request with user input
	 */
	public function postPostAdvert()
	{
		//Validate input
		$validator = Validator::make(Input::all(), Advert::$rulesCreateAdvertForm);

		//Check if validation successful
		if($validator->fails())
		{
			return Redirect::route('get_postad')
				->withErrors($validator)
				->withInput();
		}
		else
		{
			//Create new advert
			$advert = new Advert;
			$advert->customer_id = Auth::user()->id;
			//$advert->number_plate   = strtoupper(Input::get('number_plate'));
			$advert->title = Input::get('title');
			$advert->price = Input::get('price');
			$advert->make = Input::get('make');
			$advert->model = Input::get('model');
			$advert->gearbox = Input::get('gearbox');
			$advert->fuel_type = Input::get('fuel_type');
			$advert->mileage = Input::get('mileage');
			$advert->colour = Input::get('colour');
			$advert->description = Input::get('description');

			$image = new CarPics;

			if(Input::hasFile('image'))
			{
				//Get image
				$file = Input::file('image');

				//Generate new name
				$name = time() . '-' . str_random(10) . '.jpeg';

				//Move the image to image folder with in public directory
				$file = $file->move(public_path() . '/images/', $name);

				//Insert the new name within car_ad_images, under image column
				$image->image = $name;

			}

			//If the advert data saves correctly, then use the new adverts
			//id and store it under the advert_id column
			if($advert->save())
			{
				$image->advert_id = $advert->id;

				//Save the image to DB
				$image->save();

				return Redirect::route('home')
					->with('global', 'Success, car is now online :)');
			}

		}

		return Redirect::route('home')
			->with('global', 'Car could not be uploaded, please try again');
	}

	public function getViewAdvert($id)
	{
		$advert = Advert::find($id);
		$images = CarPics::whereAdvert_id($advert->id)->first();

		if($advert)
		{
			return View::make('advert.viewAdvert')
				->with('advert', $advert)
				->with('images', $images);
		}
	}

	public function getSearch()
	{
		//Gets search field user input
		$query = Input::get('s');

		//Checks if there is Input value
		if($query)
		{
			//Create LIKE query from input
			$ads = Advert::where('title', 'LIKE', "%$query%")->paginate(10);

			//Redirects to searchAdvert page and send values
			return View::make('search.results')
				->with('ads', $ads);
		}
	}

	//Add advert to be compared using advert id
	public function getAddAdvertCompare($id)
	{
		//Check if user is logged in
		if(Auth::check())
		{
			$countCompares = Compare::where('user_id', '=', Auth::user()->id)->count();

			if($countCompares < 5)
			{
				//Queries to to
				$userCompare = Compare::where('user_id', Auth::user()->id)
					->where('advert_id', $id)
					->get();

				if($userCompare->isEmpty())
				{
					$compare = new Compare;
					$compare->user_id = Auth::user()->id;
					$compare->advert_id = $id;
					$compare->save();
				}
			}
			else
			{
				return Redirect::back()
					->withInput()
					->with('global', 'Your compare is FULL, please remove some to compare this one');
			}

			return Redirect::back()->withInput();

		}
		else
		{
			return Redirect::route('home')
				->with('global', 'An Error has occurred!');
		}
	}

	public function getAdvertCompareView()
	{
		$compareList = Compare::where('user_id', Auth::user()->id)
			->paginate(10);

		if($compareList)
		{
			//Redirects to searchAdvert page and send values
			return View::make('advert.compareAdvert')
				->with('compareList', $compareList);
		} else
		{
			return Redirect::route('home')
				->with('global', 'You are currently not COMPARING any cars.');
		}


	}

	public function getAdvertCompareRemove($id)
	{
		if($id)
		{
			$compare = Compare::where('id', $id)->delete();

			return Redirect::back()->withInput();
		}
	}


	//Add advert to user watchlist
	public function getAddWatch($id)
	{
		//Check if user is logged in
		if(Auth::check())
		{
			//Queries to to
			$userWatch = Watch::where('user_id', Auth::user()->id)
				->where('advert_id', $id)
				->get();

			if($userWatch->isEmpty())
			{
				$watch = new Watch;
				$watch->user_id = Auth::user()->id;
				$watch->advert_id = $id;
				$watch->save();
			}

			return Redirect::back()->withInput();
		} else
		{
			return Redirect::route('home')
				->with('global', 'You are currently not COMPARING any cars.');
		}
	}


	//Display user watchlist
	public function getWatchListView()
	{
		$watchList = Watch::paginate(10);

		if(count($watchList))
		{
			//Redirects to searchAdvert page and send values
			return View::make('advert.viewWatchList')
				->with('watchList', $watchList);
		} else
		{
			return Redirect::route('home')
				->with('global', 'You are currently not WATCHING any cars.');
		}
	}


	//Remove ad from usr watch list
	public function getWatchRemove($id)
	{
		if($id)
		{
			$watch = Watch::where('id', $id)->delete();

			return Redirect::back()->withInput();
		}
	}
}
