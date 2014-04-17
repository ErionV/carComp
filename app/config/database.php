<?php

return [

	'fetch' => PDO::FETCH_CLASS,


	'default' => 'mysql',


	'connections' => [

        //Live Server database Settings
        'mysql' => [
            'driver'    => 'mysql',
            'host'      => $_ENV['host'],
            'database'  => $_ENV['database'],
            'username'  => $_ENV['username'],
            'password'  => $_ENV['password'],
            'charset'   => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix'    => '',
        ]
	],

	'migrations' => 'migrations',

	'redis' => [

		'cluster' => false,

		'default' => [
			'host'     => '127.0.0.1',
			'port'     => 6379,
			'database' => 0
		]

	]

];
