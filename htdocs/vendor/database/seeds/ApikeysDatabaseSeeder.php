<?php

use Illuminate\Database\Seeder;

class ApikeysDatabaseSeeder extends Seeder {

	public function run()
	{
		
     DB::collection('apikeys')->delete();

     $apikeys = array(
         ['users_id' => 1, 'slug' => 'slugkey123', 'api_key' => 'key123', 'app_name' => 'App Name', 'app_desc' => 'App Desc', 'request_limit' => 5000, 'request_count' => 100, 'approved' => true, 'created_at' => new DateTime, 'updated_at' => new DateTime],
         ['users_id' => 2, 'slug' => 'slugkey456', 'api_key' => 'key456', 'app_name' => 'App Name', 'app_desc' => 'App Desc', 'request_limit' => 5000, 'request_count' => 100, 'approved' => true, 'created_at' => new DateTime, 'updated_at' => new DateTime],
         ['users_id' => 3, 'slug' => 'slugkey789', 'api_key' => 'key789', 'app_name' => 'App Name', 'app_desc' => 'App Desc', 'request_limit' => 5000, 'request_count' => 100, 'approved' => true, 'created_at' => new DateTime, 'updated_at' => new DateTime],         
     );

     DB::collection('apikeys')->insert($apikeys);
	}

}