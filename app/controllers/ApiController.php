<?php

class ApiController extends BaseController {

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
	
	public function getSiteNavigation()
	{
		$navigation = Element::getSiteNavigation(Input::get('apiKey'));

		return Response::json($navigation);	
	}

	public function getSiteDetails()
	{
		$siteDetails = Site::getSitesForUser(Input::get('apiKey'));

		return Response::json($siteDetails);	
	}

	public function getCollections()
	{
		$collections = Collection::getCollectionsForUser(Input::get('apiKey'));

		foreach($collections as $collection){
			$data[$collection->id]                     = $collection;
			$data[$collection->id]['collectionImages'] = Collection::getCollectionImages(Input::get('apiKey'),$collection->id);
		}

		return Response::json($data);	
	}

	public function getPageDetails($id)
	{
		$pageDetails = Element::getPage(Input::get('apiKey'),$id);

		return Response::json($pageDetails);	
	}

}
