<?php
namespace models;

use Illuminate\Auth\UserInterface;
use Cartalyst\Sentry\Users\Eloquent\User as SentryUserModel;

class User extends SentryUserModel implements UserInterface {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	public static function boot()
    {
        self::$hasher = new \Cartalyst\Sentry\Hashing\NativeHasher;
    }

    public function getAuthIdentifier() 
	{ 
		return $this->getKey();
	}


	public function getAuthPassword() 
	{ 
		
	}

	public function getRememberToken()
	{

	}

	public function setRememberToken($value)
	{

	}

	public function getRememberTokenName()
	{

	}

	public function comments()
    {
        return $this->hasMany('Comment');
    }
}
