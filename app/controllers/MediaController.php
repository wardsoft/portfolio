<?php

class MediaController extends BaseController {

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
		$files = File::files(public_path().'/uploads/'.Auth::user()->id);
		$index = 1;
		$folderpath = '/uploads/'.Auth::user()->id.'/';

		foreach($files as $file){
			$data['files'][$index] = URL::to('/').$folderpath.basename($file);
			$index++;
		}

		$this->layout->content = View::make('pages-media')->with('data',$data);
	}

	public function upload()
	{

		$file = Input::file('file');
		$folderpath = '/uploads/'.Auth::user()->id.'/';

		if(Input::get('collectionID')){
			$folderpath = $folderpath.Input::get('collectionID');
		}

		$fullDestinationPath = public_path().$folderpath;

		if(!File::exists($fullDestinationPath)) {
		   $result = File::makeDirectory($fullDestinationPath, 0775, true);
		}
		
		$filename = Input::file('file')->getClientOriginalName();

		$upload_success = Input::file('file')->move($fullDestinationPath, $filename);

		if( $upload_success ) {
		   
		   if(Input::get('collectionID')){
		   		$image = $this->_insertImage(Input::get('collectionID'),$filename,$folderpath);
		   }
		   else{
		   		$image['image_path'] = URL::to('/').$folderpath;
		   		$image['image_name'] = $filename;
		   }

		   return Response::json($image);
		} else {
		   return Response::json('error', 400);
		}
	}

	private function _insertImage($collectionID,$imageName,$image_path)
	{
		return $image = Image::create(array(
				'user_id' => Auth::user()->id,
	            'collection_id' => $collectionID,
	            'title' => $imageName,
	            'image_name' => $imageName,
	            'active' => 1,
	            'image_path' => URL::to('/').$image_path));
	}

}


