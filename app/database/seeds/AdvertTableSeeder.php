<?php

class AdvertTableSeeder extends Seeder {

    public function run()
    {
        $faker = Faker\Factory::create();

        Advert::truncate();

        foreach(range(1, 50) as $index)
        {
            Advert::create([
                'make'          => $faker->word,
                'model'         => $faker->word,
                'title'         => $faker->sentence(2),
                'description'   => $faker->paragraph(8),
                'price'         => $faker->numberBetween(800, 69000),
                'gearbox'       => $faker->word,
                'fuel_type'     => $faker->word,
                'mileage'       => $faker->numberBetween(45, 16000),
                'colour'        => $faker->colorName
            ]);
        }
    }

}