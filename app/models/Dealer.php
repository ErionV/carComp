<?php

class Dealer extends Eloquent
{
    protected $guarded = array();

    protected $fillable = [
        'email',
        'username',
        'company_name',
        'company_number',
        'post_code',
        'website',
        'password',
        'password_temp',
        'code',
        'active'
    ];

    public static $rulesRegisterForm = [
        'email'         => 'required|max:50|email|unique:users',
        'username'      => 'required|max:20|min:3|unique:users',
        'company_name'  => 'required|max:60|min:3|unique:dealers',
        'company_number'=> 'required|max:10|min:8|unique:dealers',
        'contact_number'=> 'required|max:15|min:11|unique:dealers',
        'post_code'     => 'required|max:8|min:6',
        'about'         => 'required|max:255|min:20',
        'website'       => 'max:100|min:5|unique:dealers',
        'password'      => 'required|max:60|min:6',
        'password_again'=> 'required|max:60|min:6|same:password'
    ];

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'dealers';

    /**
     * Get the unique identifier for the user.
     *
     * @return mixed
     */
    public function getAuthIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Get the password for the user.
     *
     * @return string
     */
    public function getAuthPassword()
    {
        return $this->password;
    }

    /**
     * Get the e-mail address where password reminders are sent.
     *
     * @return string
     */
    public function getReminderEmail()
    {
        return $this->email;
    }

}
