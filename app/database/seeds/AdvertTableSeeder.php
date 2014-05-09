<?php

class AdvertTableSeeder extends Seeder
{

	public function run()
	{
		$faker = Faker\Factory::create();

		Advert::truncate();

		foreach(range(1, 50) as $index)
		{
			$randomCar = CarData::orderBy(DB::raw('RAND()'))->first();

			Advert::create([
				'car_id'        => $randomCar->model_id,
				'make'          => $randomCar->model_make_id,
				'model'         => $randomCar->model_name,
				'title'         => $faker->sentence(2),
				'description'   => $faker->paragraph(8),
				'price'         => $faker->numberBetween(800, 45000),
				'gearbox'       => $faker->word,
				'fuel_type'     => $faker->word,
				'mileage'       => $faker->numberBetween(45, 16000),
				'colour'        => $faker->colorName
			]);
		}
	}

}