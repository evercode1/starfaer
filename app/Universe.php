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


    public function galaxies()
    {

        return $this->hasMany('App\Galaxy');

    }
}
