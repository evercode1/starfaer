<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Atmosphere extends Model
{

    protected $fillable = ['name',
                           'slug',
                           'is_active',
                           'galaxy_id',
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

    public function planet()
    {

        return $this->hasMany('App\Planet');

    }

}