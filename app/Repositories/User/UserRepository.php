<?php

namespace Repositories\User;

use models\User as User;

use \Sentry as Sentry;

class UserRepository implements IUserRepository
{
	public $user;

	public function __construct(User $user)
	{
		$this->user = $user;
	}

	public function all()
	{
		return $this->user->all();
	}

	public function create(array $data)
	{	
		$count = $this->user->where('email', '=', $data['email'])->count();

		if(!$count)
		{
		// Create the user
			$user = Sentry::createUser(array(
				'email'        => $data['email'],
				'persist_code' => $data['facebookId'],
				'password'     => $data['facebookId'],
				'first_name'   => $data['username'],
				'activated'    => true,
		    ));
		}

	}

	public function get($email)
	{
		$user = Sentry::findUserByCredentials(array(
			'email' => $email
		));

		return $user;
	}

	public function getLogin()
	{
		$user = Sentry::getUser();

		return $user;
	}
}