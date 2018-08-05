<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Planet extends Model
{

    protected $fillable = ['name',
                           'slug',
                           'galaxy_id',
                           'universe_id',
                           'star_id',
                           'atmosphere_id',
                           'planet_detail_id',
                           'planet_type_id',
                           'mass',
                           'atmospheric_density',
                           'planet_number_from_star',
                           'moon_count',
                           'ocean_count',
                           'continent_count',
                           'is_active',
                           'is_life_present',
                           'is_ringed',
                           'coordinates',
                           'description',
                           'image_name',
                           'image_extension'];

    public function universe()
    {

       return $this->belongsTo('App\Universe');

    }

    public function galaxy()
    {

        return $this->belongsTo('App\Galaxy');

    }

    public function planetType()
    {

        return $this->belongsTo('App\PlanetType');

    }

    public function atmosphere()
    {

        return $this->belongsTo('App\Atmosphere');

    }

    public function star()
    {

        return $this->belongsTo('App\Star');

    }

}