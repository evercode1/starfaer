<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Universe extends Model
{
    protected $fillable = [

                            'name',
                            'author',
                            'slug'


    ];

    public static function getUniverseName($id)
    {

        $universe = static::where('id', $id)->first();

        return $universe->name;

    }

    public function galaxies()
    {

        return $this->hasMany('App\Galaxy');

    }
}
