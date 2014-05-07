<?php

class AdvertController extends BaseController
{
    /*
    * Return post advert View (GET)
    */
    public function getPostAdvert()
    {
        return  View::make('advert.postAdvert');
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
            return  Redirect::route('get_postad')
                    ->withErrors($validator)
                    ->withInput();
        }
        else
        {
            //Create new advert
            $advert = new Advert;
            $advert->customer_id    = Auth::user()->id;
            //$advert->number_plate   = strtoupper(Input::get('number_plate'));
            $advert->title          = Input::get('title');
            $advert->price          = Input::get('price');
            $advert->make           = Input::get('make');
            $advert->model          = Input::get('model');
            $advert->gearbox        = Input::get('gearbox');
            $advert->fuel_type      = Input::get('fuel_type');
            $advert->mileage        = Input::get('mileage');
            $advert->colour         = Input::get('colour');
            $advert->description    = Input::get('description');

            $image = new CarPics;

            if(Input::hasFile('image'))
            {
                //Get image
                $file               = Input::file('image');

                //Generate new name
                $name               = time() . '-' . str_random(10) . '.jpeg';

                //Move the image to image folder with in public directory
                $file               = $file->move(public_path().'/images/', $name);

                //Insert the new name within car_ad_images, under image column
                $image->image       = $name;

            }

            //If the advert data saves correctly, then use the new adverts
            //id and store it under the advert_id column
            if($advert->save())
            {
                $image->advert_id   = $advert->id;

                //Save the image to DB
                $image->save();

                return  Redirect::route('home')
                        ->with('global', 'Success, car is now online :)');
            }

        }

        return  Redirect::route('home')
                ->with('global', 'Car could not be uploaded, please try again');
    }

    public function getViewAdvert($id)
    {
        $advert = Advert::find($id);
        $images = CarPics::whereAdvert_id($advert->id)->first();

        if($advert)
        {
            return  View::make('advert.viewAdvert')
                    ->with('advert', $advert)
                    ->with('images', $images);
        }
    }

    public function adSearch()
    {
        $query = Input::get('s');

        if($query)
        {
            $ads = Advert::where('title', 'LIKE', "%$query%")->get();

            return View::make('advert.searchAdvert')
                ->with('ads', $ads);
        }
    }
}
