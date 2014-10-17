<?php

class DashboardController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/
	
	protected $layout = 'layouts.master';

	public function index()
	{
		$sites = Site::getSitesForUser(Auth::user()->id);

		$this->layout->content = View::make('pages-dashboard')->with('sites',$sites);
	}

	public function profile()
	{
		return View::make('pages-user-profile');
	}

}
