<?php

return [

    'connections' => [
        'mysql' => [
            'host'      => $_ENV['host'],
            'unix_socket'   => '/Applications/MAMP/tmp/mysql/mysql.sock',
            'database'  => $_ENV['database'],
            'username'  => $_ENV['username'],
            'password'  => $_ENV['password'],
        ]
    ]
];
