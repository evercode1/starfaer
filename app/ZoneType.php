<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ZoneType extends Model
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


    public static function getZoneTypeName($id)
    {

        $zoneType = static::where('id', $id)->first();

        return $zoneType->name;

    }

    public function universe()
    {

       return $this->belongsTo('App\Universe');

    }

    public function zones()
    {

        return $this->hasMany('App\Zone');

    }

}