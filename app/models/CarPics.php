<?php

class CarPics extends Eloquent
{
	protected $fillable = [
        'adver_id',
        'image'
    ];

	public static $rules = array();

    public $table = 'car_ad_images';
}
