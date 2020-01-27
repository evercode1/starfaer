<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WorldTermType extends Model
{

    protected $fillable = ['name',
                           'is_active',
                           ];

    public function worldTypes()
    {

        return $this->hasMany('App\WorldTerm');

    }



}