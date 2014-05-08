<?php

use Faker\Factory as Faker;

class ImagesTableSeeder extends Seeder
{

	public function run()
	{
		$faker = Faker::create();

        CarPics::truncate();

		foreach(range(1, 50) as $index)
		{
			CarPics::create([
                'advert_id'     => $index,
                'image'         => '1398133686-LRBF594xKX.jpeg'
			]);
		}
	}

}