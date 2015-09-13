<?php namespace App\Http\Controllers;

use App\Apikey;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Helpers\Helper;
use Illuminate\Http\Request;
use Input;
use Redirect;

class ApikeysController extends Controller {

    public function __construct()
    {
        $this->middleware('auth');
    }

    protected $rules = [
        'app_name' => ['required', 'min:3'],
        'slug' => ['required', 'unique:apikeys', 'alpha_num'],
    ];

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{

        //if ($request->user()) {

            //$userId = $request->user()->id;
            //var_dump($userId);

        $apikeys = Apikey::where( 'users_id', 'all', array($request->user()->id) )->whereNull('deleted_at')->get();
            //$apikeys = Apikey::all();

            //var_dump($apikeys);

        //}
        return view('apikeys.index', compact('apikeys'));

    }

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
		return view('apikeys.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
     * @param \Illuminate\Http\Request $request
	 */
	public function store(Request $request)
	{

        $this->validate($request, $this->rules);

        $input = Input::all();
        $input['users_id'] = $request->user()->id;
        $input['api_key'] = Helper::makeGuid();
        $input['approved'] = true;
        $input['request_limit_day'] = 100000;
        $input['request_burst_sec'] = 5;
        $input['request_count'] = 0;
        Apikey::create( $input );

        return Redirect::route('apikeys.index')->with('message', 'API Key created');

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show(Apikey $apikey, Request $request)
	{
        //$apikey = Apikey::where( 'users_id', 'all', array($request->user()->id) )->get();
        $now = time();
        $dateDiff = $apikey->created_at->diffForHumans(\Carbon\Carbon::now());
        $daysSince = floor($dateDiff/60*60*24);
        if ( $daysSince >= 1 ) {
            $avgReqPerDay = $apikey->request_count / $daysSince;
        } else {
            $avgReqPerDay = 0;
        }

        // format results
        $apikey->request_count = number_format($apikey->request_count);
        $apikey->request_limit_day = number_format($apikey->request_limit_day);
        $apikey->requests_per_day = number_format(round($avgReqPerDay));
        $apikey->request_burst_sec = number_format($apikey->request_burst_sec);

		return view('apikeys.show', compact('apikey'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit(Apikey $apikey)
	{
		//
		return view('apikeys.edit', compact('apikey'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
     * @param \Illuminate\Http\Request $request
	 */
	public function update(Apikey $apikey, Request $request)
	{
        $this->validate($request, $this->rules);

        $input = array_except(Input::all(), '_method');
        $apikey->update($input);

        return Redirect::route('apikeys.show', $apikey->slug)->with('message', 'API Key updated.');
		
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy(Apikey $apikey)
	{
        // change to deleted false
        $apikey->delete();

        return Redirect::route('apikeys.index')->with('message', 'API Key deleted.');
	}

}
