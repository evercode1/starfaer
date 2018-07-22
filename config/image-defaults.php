<?php

   /* Image Defaults
   | We set the config here so that we can keep our controllers clean.
   | Configure each image type with an image path.
   | the empty space is intentional for the code generator.
   | first array key should start on line 20
   */

return [







    // Begin Zone Image Config Array Method


        'zone' => [
                'destinationFolder'     => '/imgs/zone/',
                'createFolder'          => '/imgs/zone',
                'destinationThumbnail'  => '/imgs/zone/thumbnails/',
                'thumbPrefix'           => 'thumb-',
                'imagePath'             => '/imgs/zone/',
                'thumbnailPath'         => '/imgs/zone/thumbnails/thumb-',
                'thumbHeight'           => 60,
                'thumbWidth'            => 60,
            ],



    // End Zone Image Config Array Method
    
    // Begin ZoneType Image Config Array Method


        'zonetype' => [
                'destinationFolder'     => '/imgs/zonetype/',
                'createFolder'          => '/imgs/zonetype',
                'destinationThumbnail'  => '/imgs/zonetype/thumbnails/',
                'thumbPrefix'           => 'thumb-',
                'imagePath'             => '/imgs/zonetype/',
                'thumbnailPath'         => '/imgs/zonetype/thumbnails/thumb-',
                'thumbHeight'           => 60,
                'thumbWidth'            => 60,
            ],



    // End ZoneType Image Config Array Method
    
    
    
    
    
    
    


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