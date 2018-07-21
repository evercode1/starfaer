<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Galaxy extends Model
{

    protected $fillable = ['name',
                           'galaxy_type_id',
                           'slug',
                           'is_active',
                           'universe_id'];

    public function universe()
    {

        return $this->belongsTo('App\Universe');

    }

}