<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StarType extends Model
{

    protected $fillable = ['name',
                           'slug',
                           'is_active',
                           'description',
                            'wiki_url',
                           'universe_id',
                           'image_name',
                           'image_extension'];

    public function universe()
    {

       return $this->belongsTo('App\Universe');

    }

}