<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Galaxy extends Model
{

    protected $fillable = ['name',
                           'galaxy_type_id',
                           'slug',
                           'is_active',
                           'description',
                           'universe_id'];

    public function universe()
    {

        return $this->belongsTo('App\Universe');

    }

    public function galaxyType()
    {

        return $this->belongsTo('App\GalaxyType');


    }

    public function stars()
    {

        return $this->hasMany('App\Star');

    }

    public function planetTypes()
    {

        return $this->hasMany('App\PlanetType');

    }

    public function atomospheres()
    {

        return $this->hasMany('App\Atmosphere');

    }

    public function surfaceTypes()
    {

        return $this->hasMany('App\SurfaceType');


    }

    public function moons()
    {

        return $this->hasMany('App\Moon');

    }

}