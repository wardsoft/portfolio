<?php

class CollectionsController extends BaseController {

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
		$collections = Collection::getCollectionsForUser(Auth::user()->id);

		$this->layout->content = View::make('pages-collections')->with('collections',$collections);
	}

	public function addCollection()
	{
		$data['action'] = 'Add';
		$data['collectionImages'] = array();
		$this->layout->content = View::make('pages-collections-add')->with('data',$data);
	}

	public function createCollection()
	{
		$active = 0;

		if(Input::get('active')){
			$active = 1;
		}
		else{
			$active = 0;
		}
	
		$collection = Collection::create(array(
				'user_id' => Auth::user()->id,
	            'title' => Input::get('title'),
	            'description' => trim(Input::get('description')),
	            'visability' => Input::get('visability'),
	            'active' => $active));
		$collection['success'] = 'true';
		$collection['message'] = '<strong>Great!</strong> Your new collection is created. Now lets add some images';

		return $collection;
	}

	public function deleteCollection()
	{
		$collection = Collection::find(Input::get('collectionID'));
		$collection->deleted = 1;
		$collection->save();
		
		$collection['success'] = 'true';
		$collection['message'] = '<strong>Great!</strong> Your collection has successfully been deleted';

		return $collection;
	}

	public function editCollection($id)
	{
		$data['collection']       = Collection::getCollection(Auth::user()->id,$id);
		$data['collectionImages'] = Collection::getCollectionImages(Auth::user()->id,$id);
		$data['action']           = 'Update';

		$this->layout->content = View::make('pages-collections-add')->with('data',$data);
	}

	public function updateCollection($id)
	{
		if(Input::get('active')){
			$active = 1;
		}
		else{
			$active = 0;
		}

		$collection = Collection::find($id);
		$collection->title = Input::get('title');
		$collection->description = trim(Input::get('description'));
		$collection->visability = Input::get('visability');
		$collection->active = $active;

		$collection->save();
		$collection['success'] = 'true';
		$collection['message'] = '<strong>Great!</strong> Your collection has successfully been updated';
		
		return Response::json($collection);
	}

	public function updateCollectionImageOrder()
	{
		$collection = Collection::find(Input::get('collectionID'));
		$collection->image_order = Input::get('order');
		$collection->save();
		return $collection;
	}

}
