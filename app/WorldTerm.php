<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WorldTerm extends Model
{

    protected $fillable = ['name',
                           'slug',
                           'is_active',
                           'description',
                           'planet_id',
                           'book_id',
                           'world_term_type_id'
                           ];

    public function worldTermType()
    {

       return $this->belongsTo('App\WorldTermType');

    }

}