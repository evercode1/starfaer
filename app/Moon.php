<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Moon extends Model
{

    protected $fillable = ['name',
                           'slug',
                           'is_active',
                           'galaxy_id',
                           'planet_id',
                           'surface_type_id',
                           'atmosphere_id',
                           'orbital_position',
                           'mass',
                           'description',
                           'universe_id',
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

    public function surfaceType()
    {

        return $this->belongsTo('App\SurfaceType');

    }

    public function atmosphere()
    {

        return $this->belongsTo('App\Atmosphere');

    }

    public function planet()
    {

        return $this->belongsTo('App\Planet');

    }

}