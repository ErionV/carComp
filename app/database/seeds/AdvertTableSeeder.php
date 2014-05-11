<?php

class AdvertTableSeeder extends Seeder
{
	public function run()
	{
		//Create faker variable
		$faker = Faker\Factory::create();

		//Empty Advert table
		Advert::truncate();

        $transmission   = ['Automatic', 'Manual', 'Semi-Auto'];
        $fuel_type      = ['Bio-Fuel', 'Electric', 'Diesel', 'Petrol', 'Hybrid', 'LPG'];

		foreach(range(1, 50) as $index)
		{
			$randomCar = CarData::orderBy(DB::raw('RAND()'))->first();

			Advert::create([
				'car_id'        => $randomCar->model_id,
				'make'          => ucfirst(strtolower($randomCar->model_make_id)),
				'model'         => ucfirst(strtolower($randomCar->model_name)),
				'title'         => ucfirst(strtolower($randomCar->model_make_id)).' '.$randomCar->model_name.' '.$randomCar->model_trim,
				'description'   => $faker->paragraph(8),
				'price'         => $faker->numberBetween(800, 45000),
				'gearbox'       => $transmission[rand(0, count($transmission) - 1)],
				'fuel_type'     => $fuel_type[rand(0, count($fuel_type) - 1)],
				'mileage'       => $faker->numberBetween(45, 16000),
				'colour'        => $faker->colorName
			]);
		}
	}
}