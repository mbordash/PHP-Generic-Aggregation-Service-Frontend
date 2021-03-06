<?php

return [

	/*
	|--------------------------------------------------------------------------
	| PDO Fetch Style
	|--------------------------------------------------------------------------
	|
	| By default, database results will be returned as instances of the PHP
	| stdClass object; however, you may desire to retrieve records in an
	| array format for simplicity. Here you can tweak the fetch style.
	|
	*/

	'fetch' => PDO::FETCH_CLASS,

	/*
	|--------------------------------------------------------------------------
	| Default Database Connection Name
	|--------------------------------------------------------------------------
	|
	| Here you may specify which of the database connections below you wish
	| to use as your default connection for all database work. Of course
	| you may use many connections at once using the Database library.
	|
	*/

	'default' => 'mongodbPrd',

	/*
	|--------------------------------------------------------------------------
	| Database Connections
	|--------------------------------------------------------------------------
	|
	| Here are each of the database connections setup for your application.
	| Of course, examples of configuring each database platform that is
	| supported by Laravel is shown below to make development simple.
	|
	|
	| All database work in Laravel is done through the PHP PDO facilities
	| so make sure you have the driver for your particular database of
	| choice installed on your machine before you begin development.
	|
	*/

	'connections' => [

		'sqlite' => [
			'driver'   => 'sqlite',
			'database' => storage_path().'/database.sqlite',
			'prefix'   => '',
		],

		'mysql' => [
			'driver'    => 'mysql',
			'host'      => env('DB_HOST', 'localhost'),
			'database'  => env('DB_DATABASE', 'upsert'),
			'username'  => env('DB_USERNAME', 'root'),
			'password'  => env('DB_PASSWORD', 'root'),
			'charset'   => 'utf8',
			'collation' => 'utf8_unicode_ci',
			'prefix'    => '',
			'strict'    => false,
		],

		'pgsql' => [
			'driver'   => 'pgsql',
			'host'     => env('DB_HOST', 'localhost'),
			'database' => env('DB_DATABASE', 'forge'),
			'username' => env('DB_USERNAME', 'forge'),
			'password' => env('DB_PASSWORD', ''),
			'charset'  => 'utf8',
			'prefix'   => '',
			'schema'   => 'public',
		],

		'sqlsrv' => [
			'driver'   => 'sqlsrv',
			'host'     => env('DB_HOST', 'localhost'),
			'database' => env('DB_DATABASE', 'forge'),
			'username' => env('DB_USERNAME', 'forge'),
			'password' => env('DB_PASSWORD', ''),
			'prefix'   => '',
		],
		'mongodbPrd' => [
    			'driver'   => 'mongodb',
				'host'     => array('candidate.52.mongolayer.com:10429','candidate.53.mongolayer.com:10028'),
				//'host'     => array('54.224.53.146:10028','54.226.134.213:10429'),
				//'host'     => array('candidate.53.mongolayer.com:10028'),
    			//'port'     => 10028,
                //'host'     => 'candidate.53.mongolayer.com',
                //'port'     => 10028,
    			'username' => 'www_user',
    			'password' => '19283747181289',
    			'database' => 'upsert',
    			'options' => array(
					'replicaSet' => 'set-560884b1cf153c0344001188'
				//	'readPreference' => 'secondaryPreferred'
        		//	'db' => 'admin' // sets the authentication database required by mongo 3
				)

		],
		'mongodbDev' => [
			'driver'   => 'mongodb',
			'host'     => 'localhost',
<<<<<<< Updated upstream
=======
			//'port'     => 10028,
			//'host'     => 'candidate.53.mongolayer.com',
			//'port'     => 10028,
>>>>>>> Stashed changes
			'database' => 'upsert'
		],

	],

	/*
	|--------------------------------------------------------------------------
	| Migration Repository Table
	|--------------------------------------------------------------------------
	|
	| This table keeps track of all the migrations that have already run for
	| your application. Using this information, we can determine which of
	| the migrations on disk haven't actually been run in the database.
	|
	*/

	'migrations' => 'migrations',

	/*
	|--------------------------------------------------------------------------
	| Redis Databases
	|--------------------------------------------------------------------------
	|
	| Redis is an open source, fast, and advanced key-value store that also
	| provides a richer set of commands than a typical key-value systems
	| such as APC or Memcached. Laravel makes it easy to dig right in.
	|
	*/

	'redis' => [

		'cluster' => false,

		'default' => [
			'host'     => 'aws-us-east-1-portal.8.dblayer.com',
			//'host'     => '54.85.73.172',
			'port'     => 10467,
			'database' => 0,
			'password' => 'XKILQLDHPQMPJDPY'
		],

	],

];
