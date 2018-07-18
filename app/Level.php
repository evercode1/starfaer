<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    protected $fillable = ['name'];


    public function videos()
    {

        return $this->hasMany('App\Video');
    }


}
