<?php namespace App\Http\Controllers;

use App\Apikey;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Input;
use Redirect;

class ApikeysController extends Controller {

    protected $rules = [
        'app_name' => ['required', 'min:3'],
        'slug' => ['required', 'unique:apikeys', 'alpha_num'],
    ];

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$apikeys = Apikey::all();
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
        Apikey::create( $input );

        return Redirect::route('apikeys.index')->with('message', 'API Key created');

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show(Apikey $apikey)
	{
		//
		//$apikey->created_at = $apikey->created_at->date;

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
        $apikey->delete();

        return Redirect::route('apikeys.index')->with('message', 'API Key deleted.');
	}

}
