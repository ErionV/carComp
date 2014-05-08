<?php

class Watch extends \Eloquent
{
    protected $table = 'watches';

    protected $fillable = ['user_id'];

    protected $hidden = [];

    public function owner()
    {
        return $this->belongsTo('User', 'user_id');
    }

    public function advert()
    {
        return $this->belongsTo('Advert', 'advert_id');
    }

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