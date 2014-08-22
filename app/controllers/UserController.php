<?php

use Repositories\User\IUserRepository as IUserRepository;
use Services\User\IUserService as IUserService;

class UserController extends \BaseController {

	protected $userRepository;

	protected $userService;

	public function __construct(IUserRepository $userRepository,IUserService $userService)
	{
		$this->userRepository = $userRepository;
		$this->userService = $userService;
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$user = $this->userService->getLogin();
		return View::make('index', array(
			'user' => $user
		));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
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
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

	public function signInWithFacebook()
    {
       // get data from input
	    $code = Input::get( 'code' );

	    // get fb service
	    $fb = OAuth::consumer( 'Facebook' );

	    // check if code is valid

	    // if code is provided get user data and sign in
	    if ( !empty( $code ) ) {

	        // This was a callback request from facebook, get the token
	        $token = $fb->requestAccessToken( $code );

	        // Send a request with it
	        $result = json_decode( $fb->request( '/me' ), true );

	        // $message = 'Your unique facebook user id is: ' . $result['id'] . ' and your name is ' . $result['name'];
	        // echo $message. "<br/>";

	        // //Var_dump
	        // //display whole array().
	        // dd($result);

	        $data = array(
	        	'facebookId' 	=> $result['id'],
	        	'username'		=> $result['name'],
	        	'email'			=> $result['email']
	        );
	        
	        
	        if ($this->userService->create($data))
	        {	
	        	try
				{
				   $user = $this->userService->get($data['email']);

				    // Log the user in
				    Sentry::login($user, false);
				}
				catch (Cartalyst\Sentry\Users\LoginRequiredException $e)
				{
				    echo 'Login field is required.';
				}

	        	$url = action('UserController@index');

	        	return Redirect::to($url);
	        }
	    }
	    // if not ask for permission first
	    else {
	        // get fb authorization
	        $url = $fb->getAuthorizationUri();

	        // return to facebook login url
	         return Redirect::to( (string)$url );
	    }


	}
}
