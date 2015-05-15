<?php namespace App\Http\Controllers;

use App\Apikey;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class ApikeysController extends Controller {

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
	 */
	public function store()
	{
		//
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
		$testvar = "michael";
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
	 */
	public function update(Apikey $apikey)
	{
		//
		return view('apikeys.update', compact('apikey'));
		
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy(Apikey $apikey)
	{
		//
	}

}
