<?php

use Faker\Factory as Faker;

class ImagesTableSeeder extends Seeder
{

	public function run()
	{
		$faker = Faker::create();

		//Truncate Car pictures table
		CarPics::truncate();

		$files = [];
		foreach (new DirectoryIterator(public_path() . '/images/') as $fileInfo)
		{
			if($fileInfo->isDot() || !$fileInfo->isFile()) continue;
			$files[] = $fileInfo->getFilename();
		}

		foreach(range(1, 50) as $index)
		{
			CarPics::create([
				'advert_id' => $index,
				'image' => $files[rand(0, count($files) - 1)]
			]);
		}
	}

}

