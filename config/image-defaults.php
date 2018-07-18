<?php

return [
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
    'books' => [
        'destinationFolder'     => '/imgs/books/',
        'destinationThumbnail'  => '/imgs/books/thumbnails/',
        'thumbPrefix'           => 'thumb-',
        'imagePath'             => '/imgs/books/',
        'thumbnailPath'         => '/imgs/books/thumbnails/thumb-',
        'thumbHeight'           => 60,
        'thumbWidth'            => 60,
    ],
];