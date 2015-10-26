<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class RequestProxy extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{

        $headers = array(
            'Authorization: Bearer 42B5F5C7-F396-45A3-853D-5AD263641062'
            // dev // 'Authorization: Bearer 6742F491-5BA6-409C-8A45-152EE78B117D'
        );

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        curl_setopt($ch, CURLOPT_URL, 'http://api.upsert.io/2.0/event/query?operator=gte&operand=0&scope=listens&group_by=true');

        $server_output = curl_exec ($ch);
        curl_close ($ch);

        return response()->json(json_decode($server_output));
	}

}
