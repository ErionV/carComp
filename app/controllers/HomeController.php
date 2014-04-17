<?php

class HomeController extends BaseController
 {

    public function home()
    {
        //Creates array of all data in car_makes table for dropdown list
        $car_make_list = ['' => 'Make ', CarMakes::lists('car_make', 'id')];

        //Creates array of all data in car_model table for dropdown list
        $car_model_list = ['' => 'Model ', CarData::limit(30)->lists('model_name', 'model_id')];

        //Returns home view with data for car MAKE dropdown
        return View::make('home')
               ->with('car_make_list', $car_make_list)
               ->with('car_model_list', $car_model_list);
    }

 }