<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

    protected $fillable = array(
        'email',
        'username',
        'password',
    );


	protected $table = 'users';


	protected $hidden = array('password');


	public function getAuthIdentifier()
	{
		return $this->getKey();
	}


	public function getAuthPassword()
	{
		return $this->password;
	}


	public function getReminderEmail()
	{
		return $this->email;
	}

    public function getRememberToken()
    {
        return $this->remember_token;
    }

    public function setRememberToken($value)
    {
        $this->remember_token = $value;
    }

    public function getRememberTokenName()
    {
        return 'remember_token';
    }
}