<?php

class HomeController extends BaseController {

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

	public function showIntro(){
		return View::make('pages-intro');
	}

	public function showSignUp(){
		return View::make('pages-signup');
	}

	public function showSignIn(){
		return View::make('pages-signin');
	}

	public function recoverPassword(){
		return View::make('pages-recover-password');
	}

	public function signIn(){
		$email = Input::get('email');
		$pwd   = Input::get('pwd');
		$returnData = array('success'=>'false','redirectURL'=>'/dashboard');

		if (Auth::attempt(array('email' => $email, 'password' => $pwd))){
			$returnData['success'] = 'true';
		}

		return json_encode($returnData);
	}

	public function signOut(){
		Auth::logout();

		return Redirect::to('sign-in');
	}

	public function signUp(){
		// Get the value from the form
		$input['email'] = Input::get('email');

		// Must not already exist in the `email` column of `users` table
		$rules = array('email' => 'unique:users,email');

		$validator = Validator::make($input, $rules);

		if ($validator->fails()) {
			$user['success'] = 'false';
		    $user['message'] = 'That email address is already registered. Are you sure you don\'t have an account?';
		}
		else {
		    // Register the new user or whatever.
		    $user = User::create(array(
	            'email' => Input::get('email'),
	            'name' => Input::get('name'),
	            'password' => Hash::make(Input::get('pwd'))));
		    $user['success'] = 'true';
		    $user['message'] = '<strong>Well done!</strong> You have now signed up to HonestEat. Please click the link in your confirmation email. Not received an email? <a href="" class="alert-link">Click here</a>.<br><a href="sign-in">Login</a>';
		}

		return $user;
	}

}
