<?php

class UsersTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		// DB::table('users')->truncate();

        User::truncate();

		$users = [
            [   'email'         => 'admin@hotmail.com',
                'username'      => 'admin',
                'password'      => Hash::make('albanian1991'),
                'active'        => 1],
            [   'email'         => 'erion.vlada@gmail.com',
                'username'      => 'ErionV',
                'password'      => Hash::make('albanian1991'),
                'code'          => 1],
            [   'email'         => 'jadeparks@hotmail.co.uk',
                'username'      => 'JadeP',
                'password'      => Hash::make('albanian1991'),
                'code'          => 1],
            [   'email'         => 'chetanpatel@hotmail.com',
                'username'      => 'ChetanP',
                'password'      => Hash::make('albanian1991'),
                'code'          => 1],
        ];

		// Uncomment the below to run the seeder
		 DB::table('users')->insert($users);
	}

}
