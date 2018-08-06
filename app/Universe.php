<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Universe extends Model
{
    protected $fillable = [

                            'name',
                            'author',
                            'description',
                            'slug'


    ];


    public function galaxies()
    {

        return $this->hasMany('App\Galaxy');

    }

    public function planetTypes()
    {

        return $this->hasMany('App\PlanetType');

    }

    public function surfaceType()
    {

        return $this->hasMany('App\SurfaceType');

    }

    public function moons()
    {

        return $this->hasMany('App\Moon');

    }
}
