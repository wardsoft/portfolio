<?php

class PagesController extends BaseController {

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
		$pages = Element::getPagesForUser(Auth::user()->id);

		$this->layout->content = View::make('pages-page')->with('pages',$pages);
	}

	public function addPage()
	{
		$data['action'] = 'Add';
		$this->layout->content = View::make('pages-page-add')->with('data',$data);
	}

	public function createPage()
	{
		$active = 0;

		if(Input::get('active')){
			$active = 1;
		}
		else{
			$active = 0;
		}
	
		$page = Element::create(array(
				'user_id' => Auth::user()->id,
				'element_type_id' => 1,
	            'title' => Input::get('title'),
	            'description' => trim(Input::get('description')),
	            'content' => trim(Input::get('content')),
	            'visability' => Input::get('visability'),
	            'active' => $active));

		$page['success'] = 'true';
		$page['message'] = '<strong>Great!</strong> Your new page is created.';

		return $page;
	}

	public function deletePage()
	{
		$page = Element::find(Input::get('pageID'));
		$page->deleted = 1;
		$page->save();
		
		$page['success'] = 'true';
		$page['message'] = '<strong>Great!</strong> Your page has successfully been deleted';

		return $page;
	}

	public function editPage($id)
	{
		$data['page']       = Element::getPage($id);
		$data['action']     = 'Update';

		$this->layout->content = View::make('pages-page-add')->with('data',$data);
	}

	public function updatePage($id)
	{
		if(Input::get('active')){
			$active = 1;
		}
		else{
			$active = 0;
		}

		$page = Element::find($id);
		$page->title = Input::get('title');
		$page->description = trim(Input::get('description'));
		$page->content = trim(Input::get('content'));
		$page->visability = Input::get('visability');
		$page->active = $active;

		$page->save();
		$page['success'] = 'true';
		$page['message'] = '<strong>Great!</strong> Your page has successfully been updated';
		
		return Response::json($page);
	}

}
