<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = ['title',
                           'subtitle',
                           'weight',
                           'author',
                           'url',
                           'is_featured',
                           'is_active',
                           'published_at',
                           'image_name',
                           'image_extension'];


}
