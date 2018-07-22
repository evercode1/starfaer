<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Zone extends Model
{

    protected $fillable = ['name',
                           'slug',
                           'is_active',
                           'is_featured',
                           'coordinates',
                           'description',
                           'universe_id',
                           'zone_type_id',
                           'image_name',
                           'image_extension'];

    public function universe()
    {

       return $this->belongsTo('App\Universe');

    }

    public function zoneType()
    {

        return $this->belongsTo('App\ZoneType');

    }

}