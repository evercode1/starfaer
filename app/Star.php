<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Star extends Model
{

    protected $fillable = ['name',
                           'slug',
                           'is_active',
                           'is_featured',
                           'is_binary',
                           'has_planets',
                           'planet_count',
                           'age',
                           'size',
                           'star_type_id',
                           'coordinates',
                           'zone_id',
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

    public function starType()
    {

        return $this->belongsTo('App\StarType');

    }

    public function zone()
    {

        return $this->belongsTo('App\Zone');

    }

    public function planets()
    {

        return $this->hasMany('App\Planet');

    }
}