<?php

class HomeController extends BaseController
{

	public function getHome()
	{
		//Get all inputs
		$make       = Input::get('car_make');
		$model      = Input::get('car_model');

		//Creates array of all data in car_makes table for dropdown list
		$car_make_list = [ Advert::orderBy('make', 'asc')
			->lists('make', 'make'), '' => 'Make '];
		//create empty array by default till make is chosen
		$car_model_list = [];


		//Initialise a view with values to be sent back
		//Drop down list
		//Old input
		$view = View::make('home')
			->with('car_make_list', $car_make_list)
			->with('car_model_list', $car_model_list)
			->with('make', $make)
			->with('model', $model);


		if($make)
		{
			//Creates array of all data in car_model table for dropdown list
			$car_model_list = [Advert::orderBy('model', 'asc')
				->distinct('model')
				->where('make', $make)
				->lists('model', 'model')];

			//
			$view->with('car_model_list', $car_model_list)
				->with('model', $model);
		}


		if($make && $model)
		{
			//Query database with make and model
			$ads = Advert::where('make', $make)
				->where('model', $model)
				->paginate(10);

			//If the query returns zero results then redirect home with no inputs
			if(count($ads) < 1)
			{
				return Redirect::route('home');
			}

			//Redirects to searchAdvert page and send values
			return View::make('search.results')
				->with('ads', $ads);
		}

		//Returns home view with data for car MAKE dropdown
		return $view;
	}
}