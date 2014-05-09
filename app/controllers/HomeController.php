<?php

class HomeController extends BaseController
{

	public function getHome()
	{
		$make   = Input::get('car_make');
		$model  = Input::get('car_model');

		Cookie::make('make', $make);
		Cookie::make('model', $model);

		//Creates array of all data in car_makes table for dropdown list
		$car_make_list = [ Advert::orderBy('make', 'asc')
			->lists('make', 'make'), '' => 'Make '];
		$car_model_list = [];


		$view = View::make('home')->with('car_make_list', $car_make_list)
			->with('car_model_list', $car_model_list);

		if($make)
		{
			//Creates array of all data in car_model table for dropdown list
			$car_model_list = ['' => 'Model ', Advert::orderBy('model', 'asc')
				->distinct('model')
				->where('make', $make)
				->lists('model', 'model')];

			return Redirect::back()
				->with('car_make_list', $car_make_list)
				->with('car_model_list', $car_model_list)
				->withInput();
		}


		//Returns home view with data for car MAKE dropdown
		return $view;
	}

	public function getHome2()
	{

	}
}