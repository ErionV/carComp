<?php

class Advert extends Eloquent
{
    protected $guarded = [];

    protected $fillable = [
        'title',
        'price',
        'description',
        'extras'
    ];

    public function watched()
    {
        return $this->hasMany('Watch');
    }

    public static $rulesCreateAdvertForm = [
       // 'number_plate'          => 'required|max:7|min:1',
        'title'                 => 'required|max:60|min:6',
        'price'                 => 'required|numeric|max:99999|min:250',
        'make'                  => 'required|max:20|min:2',
        'image'                 => 'required|image|mimes:jpeg,bmp,png',
        'model'                 => 'required|max:50|min:2',
        'gearbox'               => 'max:10|min:2',
        'fuel_type'             => 'max:10|min:2',
        'mileage'               => 'required|max:6|min:1',
        'colour'                => 'required|max:20|min:3',
        'description'           => 'required|max:1000|min:20',
    ];

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'advert';

}


