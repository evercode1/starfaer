<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GalaxyType extends Model
{

    protected $fillable = ['name',
                           'slug',
                           'is_active',
                           'is_featured',
                           'weight',
                           'description',
                           'universe_id',
                           'image_name',
                           'image_extension'];

    public function universe()
    {

       return $this->belongsTo('App\Universe');

    }

    public function galaxies()
    {

        return $this->hasMany('App\Galaxy');

    }

}