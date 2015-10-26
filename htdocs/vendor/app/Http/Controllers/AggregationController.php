<?php namespace App\Http\Controllers;

class AggregationController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard to the user.
     *
     * @return Response
     */
    public function index()
    {
        return view('services.aggregation');
    }

}
