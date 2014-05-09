<?php

class CarPics extends Eloquent
{
	protected $fillable = [
        'adver_id',
        'image'
    ];

	public function owner()
	{
		return $this->belongsTo('Advert', 'id');
	}

	public function advert()
	{
		return $this->belongsTo('Advert', 'advert_id');
	}

	public static $rules = array();

    public $table = 'car_ad_images';
}
