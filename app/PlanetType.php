<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlanetType extends Model
{

    protected $fillable = ['name',
                           'slug',
                           'is_active',
                           'wiki_url',
                           'description',
                           'universe_id',
                           'galaxy_id',
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

    public function planets()
    {

        return $this->hasMany('App\Planet');

    }

}