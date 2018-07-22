<?php

/*
   |--------------------------------------------------------------------------
   | Default Image Paths and Settings
   |--------------------------------------------------------------------------
   |
   |
   | We set the config here so that we can keep our controllers clean.
   | Configure each image type with an image path.
   |
   */

return [

    'books' => [
        'destinationFolder'     => '/imgs/books/',
        'destinationThumbnail'  => '/imgs/books/thumbnails/',
        'thumbPrefix'           => 'thumb-',
        'imagePath'             => '/imgs/books/',
        'thumbnailPath'         => '/imgs/books/thumbnails/thumb-',
        'thumbHeight'           => 60,
        'thumbWidth'            => 60,
    ],

    'galaxytypes' => [
        'destinationFolder'     => '/imgs/galaxytypes/',
        'createFolder'          => '/imgs/galaxytypes',
        'destinationThumbnail'  => '/imgs/galaxytypes/thumbnails/',
        'thumbPrefix'           => 'thumb-',
        'imagePath'             => '/imgs/galaxytypes/',
        'thumbnailPath'         => '/imgs/galaxytypes/thumbnails/thumb-',
        'thumbHeight'           => 60,
        'thumbWidth'            => 60,
    ],
];